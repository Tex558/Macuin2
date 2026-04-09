from flask import Flask, render_template

app = Flask(__name__)
app.config['TEMPLATES_AUTO_RELOAD'] = True

@app.route('/')
def index():
    return render_template('loginUs.html')

@app.route('/login')
def login():
    return render_template('loginUs.html')

@app.route('/catalogo')
def catalogo():
    return render_template('catalogoUs.html')

@app.route('/registro')
def registro():
    return render_template('registroUs.html')

@app.route('/producto')
def producto():
    return render_template('detallesPr.html')

@app.route('/carrito')
def carrito():
    return render_template('carritoUs.html')

@app.route('/resumen')
def resumen():
    return render_template('resumenPe.html')

@app.route('/confirmacion')
def confirmacion():
    return render_template('confirmacionUs.html')

@app.route('/pedidos')
def pedidos():
    return render_template('pedidosCu.html')

@app.route('/estatus')
def estatus():
    return render_template('estatusPe.html')

@app.route('/cancelar')
def cancelar():
    return render_template('cancelarPe.html')

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5001)
