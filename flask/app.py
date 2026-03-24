from flask import Flask, render_template_string
import requests

app = Flask(__name__)

@app.route('/')
def index():
    try:
        # Petición a la API para verificar conectividad
        response = requests.get('http://api:5000/docs')
        api_status = f"API alcanzable. Código de estado: {response.status_code}"
    except Exception as e:
        api_status = f"No se pudo conectar a la API. Error: {str(e)}"

    html = f"""
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Flask Frontend - Macuin</title>
        <style>
            body {{ font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 40px; background-color: #f0f2f5; color: #333; }}
            .container {{ max-width: 800px; margin: 0 auto; padding: 30px; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }}
            h1 {{ color: #2c3e50; text-align: center; border-bottom: 2px solid #3498db; padding-bottom: 15px; margin-bottom: 30px; }}
            .status-box {{ margin-top: 30px; padding: 20px; border-radius: 8px; font-size: 16px; font-weight: bold; text-align: center; }}
            .success {{ background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }}
            .error {{ background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }}
            p {{ font-size: 18px; line-height: 1.6; text-align: center; }}
        </style>
    </head>
    <body>
        <div class="container">
            <h1>¡Flask Frontend en funcionamiento!</h1>
            <p>Bienvenido al frontend construido con Flask para el proyecto Macuin2.</p>
            <div class="status-box {'success' if 'alcanzable' in api_status else 'error'}">
                <strong>Estado de conexión con la API:</strong><br>
                {api_status}
            </div>
            <p style="margin-top: 40px; font-size: 14px; color: #7f8c8d;">
                Este es un documento básico para verificar que los contenedores de Docker interactúan correctamente.
            </p>
        </div>
    </body>
    </html>
    """
    return render_template_string(html)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5001)
