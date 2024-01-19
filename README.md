
# Web Scraping: Datos BCN

## Instalación y Configuración

Para utilizar este proyecto, necesitarás instalar algunas librerías en Python 3. A continuación se detalla cómo instalar cada una de ellas:

1. **Pandas**: Una librería de Python para manipulación y análisis de datos.
2. **Requests**: Permite enviar solicitudes HTTP en Python.
3. **BeautifulSoup**: Utilizada para el análisis de documentos HTML y XML.
4. **MySQL Connector**: Una librería para conectar Python con una base de datos MySQL.

```
pip install pandas requests beautifulsoup4 mysql-connector-python
```


## Cómo Usar el Proyecto

Para ejecutar el proyecto, sigue estos pasos:

1. Ejecuta todo el código presente en el notebook main.ipynb. Esto iniciará el proceso de web scraping y almacenará los datos en tu base de datos MySQL.

2. Rellena la información presente en la primera celda.

```python
# Datos de conexión a MySQL
host = "localhost"
user = "root"
password = ""
database = "example"

# Nombre de la tabla para guardar los datos de las comunas
tabla_comunas = 'datoscomuna'
# Por defecto la tabla de "Indicadores" tendrá ese nombre.
```

