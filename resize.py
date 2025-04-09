from PIL import Image

def recortar_bordes_uniformes(pixeles_recorte):
    # Abrir imagen
    imagen = Image.open("logo.png")

    # Obtener dimensiones
    ancho, alto = imagen.size

    # Validar que el recorte no sea mayor que la mitad del tamaño de la imagen
    max_recorte = min(ancho, alto) // 2
    if pixeles_recorte * 2 > min(ancho, alto):
        raise ValueError(f"El recorte es demasiado grande. Máximo permitido: {max_recorte}px por lado.")

    # Definir el área de recorte (left, top, right, bottom)
    area_recorte = (
        pixeles_recorte,
        pixeles_recorte,
        ancho - pixeles_recorte,
        alto - pixeles_recorte
    )

    # Recortar la imagen
    imagen_recortada = imagen.crop(area_recorte)

    # Redimensionar la imagen a 1024x1024 píxeles
    imagen_redimensionada = imagen_recortada.resize((1024, 1024), Image.LANCZOS)

    # Guardar la imagen
    imagen_redimensionada.save("logo_recortado.png")
    print("✅ Imagen recortada y redimensionada guardada como: logo_recortado.png")

# Ejemplo de uso
recortar_bordes_uniformes(250)
