/**
 * Analytics: eventos de conversión (leads) para GA4 + Google Ads (ads_conversion_Contacto_1).
 * Compatible con gtag. No-op si gtag no está definido (p. ej. ANALYTICS_PROVIDER=none).
 * Eventos GA4: contact_whatsapp, contact_email, cta_contact, scroll_75.
 * Conversión Ads: se dispara en clic WhatsApp, mailto, CTA y envío del formulario (gtagSendEvent).
 */
(function () {
  'use strict';

  var gtag = window.gtag || function () {
    if (window.dataLayer) window.dataLayer.push(arguments);
  };
  var gtagSendEvent = window.gtagSendEvent || null;

  function sendEvent(eventName, params) {
    try {
      gtag('event', eventName, params || {});
    } catch (err) {
      if (typeof console !== 'undefined' && console.warn) console.warn('analytics:', eventName, err);
    }
  }

  // ——— Conversión Google Ads + GA4: enlaces (WhatsApp, mailto) ———
  document.addEventListener('click', function (e) {
    var target = e.target && (e.target.closest ? e.target.closest('a, button') : e.target);
    if (!target) return;

    var href = (target.getAttribute && target.getAttribute('href')) || '';
    var label = (target.getAttribute && target.getAttribute('data-tracking')) || target.textContent || '';

    // WhatsApp (wa.me o api.whatsapp): conversión Ads con navegación retrasada
    if (href.indexOf('wa.me') !== -1 || href.indexOf('api.whatsapp') !== -1) {
      sendEvent('contact_whatsapp', {
        event_category: 'lead',
        event_label: (label && label.trim().slice(0, 100)) || 'whatsapp_click'
      });
      if (gtagSendEvent) {
        e.preventDefault();
        e.stopPropagation();
        gtagSendEvent(href);
      }
      return;
    }

    // Email (mailto): conversión Ads con navegación retrasada
    if (href.indexOf('mailto:') === 0) {
      sendEvent('contact_email', {
        event_category: 'lead',
        event_label: (label && label.trim().slice(0, 100)) || 'email_click'
      });
      if (gtagSendEvent) {
        e.preventDefault();
        e.stopPropagation();
        gtagSendEvent(href);
      }
      return;
    }

    // CTA: Contacto, Cotizar, etc. (solo GA4; enlaces sin href especial no retrasamos navegación)
    if (target.tagName === 'BUTTON' && target.type === 'submit') return;
    var ctaText = (label && label.trim().toLowerCase()) || '';
    var isCta = target.getAttribute && target.getAttribute('data-cta') === 'contact';
    isCta = isCta ||
      ctaText.indexOf('contacto') !== -1 ||
      ctaText.indexOf('cotizar') !== -1 ||
      ctaText.indexOf('enviar') !== -1 ||
      ctaText.indexOf('agenda') !== -1;

    if (isCta) {
      sendEvent('cta_contact', {
        event_category: 'lead',
        event_label: (label && label.trim().slice(0, 100)) || 'cta_click'
      });
      if (href && gtagSendEvent) {
        e.preventDefault();
        e.stopPropagation();
        gtagSendEvent(href);
      }
    }
  }, true);

  // ——— Formulario de contacto: conversión Ads y luego envío real ———
  document.addEventListener('submit', function (e) {
    var form = e.target;
    if (!form || !form.action || (form.action.indexOf('/contact') === -1 && form.getAttribute('action') !== '/contact')) return;

    if (form._adsConversionDone) {
      form._adsConversionDone = false;
      return;
    }

    sendEvent('cta_contact', { event_category: 'lead', event_label: 'contact_form_submit' });

    if (gtagSendEvent) {
      e.preventDefault();
      e.stopPropagation();
      form._adsConversionDone = true;
      gtagSendEvent(function () {
        form.requestSubmit();
      });
    }
  }, true);

  // ——— Scroll 75% (una sola vez por página) ———
  var scroll75Sent = false;
  function onScroll() {
    if (scroll75Sent) return;
    var doc = document.documentElement;
    var scrollTop = doc.scrollTop || document.body.scrollTop;
    var scrollHeight = (doc.scrollHeight - doc.clientHeight) || 1;
    var pct = scrollHeight > 0 ? scrollTop / scrollHeight : 0;
    if (pct >= 0.75) {
      scroll75Sent = true;
      sendEvent('scroll_75', { event_category: 'engagement' });
      window.removeEventListener('scroll', onScroll, { passive: true });
    }
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
})();
