<!-- resources/views/partials/faq.blade.php -->
<section
  id="faq"
  class="py-5"
  data-aos="fade-up"
  data-aos-duration="1200"
>
  <div class="faq-content container">
    <h2 class="section-title text-center">Preguntas Frecuentes</h2>
    <p class="text-center lead mb-5">
      Encuentra respuestas a las dudas más comunes
    </p>
    <!-- Acordeón FAQ -->
    <div class="accordion" id="accordionFAQ">
      <!-- Pregunta #1 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faqOne">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapseOne"
            aria-expanded="false"
            aria-controls="collapseOne"
          >
            ¿Cómo inicio mi proyecto?
          </button>
        </h2>
        <div
          id="collapseOne"
          class="accordion-collapse collapse"
          aria-labelledby="faqOne"
          data-bs-parent="#accordionFAQ"
        >
          <div class="accordion-body">
            Contacta por WhatsApp o formulario. Hacemos un diagnóstico de 15-30 minutos para entender tu proceso actual y dónde se pierde tiempo o dinero. Luego te enviamos una propuesta con alcance, estimación y plan de trabajo.
          </div>
        </div>
      </div>

      <!-- Pregunta #2 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faqTwo">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapseTwo"
            aria-expanded="false"
            aria-controls="collapseTwo"
          >
            ¿Qué tecnologías utilizan?
          </button>
        </h2>
        <div
          id="collapseTwo"
          class="accordion-collapse collapse"
          aria-labelledby="faqTwo"
          data-bs-parent="#accordionFAQ"
        >
          <div class="accordion-body">
            Laravel para sistemas web robustos, MySQL para bases de datos escalables, React Native para apps móviles, Docker para despliegues consistentes. Stack moderno que garantiza seguridad, escalabilidad y mantenibilidad a largo plazo.          </div>
        </div>
      </div>

      <!-- Pregunta #3 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faqThree">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapseThree"
            aria-expanded="false"
            aria-controls="collapseThree"
          >
            ¿Ofrecen mantenimiento y soporte después de la entrega?
          </button>
        </h2>
        <div
          id="collapseThree"
          class="accordion-collapse collapse"
          aria-labelledby="faqThree"
          data-bs-parent="#accordionFAQ"
        >
          <div class="accordion-body">
            Sí. Ofrecemos mantenimiento y soporte para que tu sistema siga funcionando sin interrupciones. Actualizaciones, correcciones y mejoras cuando las necesites.
          </div>
        </div>
      </div>

      <!-- Pregunta #4 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faqFour">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapseFour"
            aria-expanded="false"
            aria-controls="collapseFour"
          >
            ¿Cuál es el tiempo estimado de desarrollo de un proyecto?
          </button>
        </h2>
        <div
          id="collapseFour"
          class="accordion-collapse collapse"
          aria-labelledby="faqFour"
          data-bs-parent="#accordionFAQ"
        >
          <div class="accordion-body">
            Depende del alcance. Después del diagnóstico (15-30 min) y blueprint (1-2 semanas), te damos un cronograma detallado. Desarrollo por etapas: ves avance cada 2 semanas. Proyectos típicos: 1-3 meses según complejidad.
          </div>
        </div>
      </div>

      <!-- Pregunta #5 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faqFive">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapseFive"
            aria-expanded="false"
            aria-controls="collapseFive"
          >
            ¿Qué pasa si quiero agregar más funcionalidades en el futuro?
          </button>
        </h2>
        <div
          id="collapseFive"
          class="accordion-collapse collapse"
          aria-labelledby="faqFive"
          data-bs-parent="#accordionFAQ"
        >
          <div class="accordion-body">
            Sí. Diseñamos sistemas modulares y escalables. Nuevas funcionalidades se integran sin problemas. Tu sistema crece con tu negocio sin necesidad de empezar desde cero.
          </div>
        </div>
      </div>

      <!-- Pregunta #6 -->
      <div class="accordion-item">
        <h2 class="accordion-header" id="faqSix">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapseSix"
            aria-expanded="false"
            aria-controls="collapseSix"
          >
            ¿Cómo garantizan la seguridad y protección de datos?
          </button>
        </h2>
        <div
          id="collapseSix"
          class="accordion-collapse collapse"
          aria-labelledby="faqSix"
          data-bs-parent="#accordionFAQ"
        >
          <div class="accordion-body">
            Seguridad desde el inicio: cifrado de datos, conexiones SSL, protección contra inyecciones SQL y XSS. Servidores seguros con respaldos automáticos. Cumplimiento de estándares para proteger tu información y la de tus clientes.
          </div>
        </div>
      </div>
    </div> <!-- Fin .accordion -->
  </div>
</section>
