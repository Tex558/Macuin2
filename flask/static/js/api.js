const API_URL = 'http://localhost:5000/v1';

async function apiCall(endpoint, method = 'GET', body = null) {
    const headers = { 'Content-Type': 'application/json' };
    
    const email = localStorage.getItem('user_email');
    if (email) {
        headers['X-User-Email'] = email;
    }

    const options = { method, headers };
    if (body) options.body = JSON.stringify(body);

    try {
        const response = await fetch(`${API_URL}${endpoint}`, options);
        const data = await response.json();
        if (!response.ok) throw new Error(data.detail || 'API Error');
        return data;
    } catch (error) {
        console.error('API Error:', error);
        alert('Error: ' + error.message);
        throw error;
    }
}

const Api = {
    login: async (email, password) => {
        const data = await apiCall('/auth/login', 'POST', { email, password });
        localStorage.setItem('user_email', data.email);
        localStorage.setItem('user_id', data.usuario_id);
        localStorage.setItem('user_rol', data.rol);
        localStorage.setItem('user_nombre', data.nombre);
        alert(data.mensaje);
        
        // Redirect logic based on role
        if (data.rol === 'admin' || data.rol === 'staff') {
            alert('Acceso denegado: El portal de usuarios es solo para clientes.');
            localStorage.clear();
        } else {
            window.location.href = '/catalogo'; // Ajusta la ruta a tu tienda (Usuario)
        }
    },
    logout: () => {
        localStorage.clear();
        alert('Sesión cerrada');
        window.location.href = '/login';
    },
    getUsuarios: () => apiCall('/usuarios'),
    crearUsuario: (data) => apiCall('/usuarios', 'POST', data),
    eliminarUsuario: (id) => apiCall(`/usuarios/${id}`, 'DELETE'),
    
    getProductos: () => apiCall('/productos'),
    crearProducto: (data) => apiCall('/productos', 'POST', data),
    eliminarProducto: (id) => apiCall(`/productos/${id}`, 'DELETE'),
    
    getPedidos: () => apiCall('/pedidos'),
    crearPedido: (data) => apiCall('/pedidos', 'POST', data),
    actualizarPedido: (id, data) => apiCall(`/pedidos/${id}`, 'PATCH'),
    eliminarPedido: (id) => apiCall(`/pedidos/${id}`, 'DELETE')
};

// Auto-attach API instance
window.Api = Api;
