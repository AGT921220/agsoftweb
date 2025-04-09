
sharp('hero.png')                // Imagen de entrada
  .resize(1920)                  // Redimensiona a 1920px de ancho
  .avif({ quality: 60 })          // Configura la calidad a 60
  .toFile('hero-converted.avif', (err, info) => {  // Crea una nueva imagen 'hero-converted.avif'
    if (err) {
      console.error("Error al convertir la imagen:", err);
    } else {
      console.log("Imagen convertida correctamente:", info);
    }
  });
