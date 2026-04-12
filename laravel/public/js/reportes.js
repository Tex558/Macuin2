/**
 * MACUIN ADMIN — Report Generation Module (Backend-Delegated)
 * Sends filtered table data to FastAPI endpoints to generate PDF, XLSX, and DOCX files.
 */

const Reportes = (() => {
    // API base URL is handled by window.Api.url if available, else relative
    const API_BASE = (window.Api && window.Api.url) ? window.Api.url : 'http://localhost:8000';

    async function generateReport(format, title, headers, rows, filename) {
        const endpoint = `${API_BASE}/reportes/${format}`;
        
        try {
            const response = await fetch(endpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ title, headers, rows, filename })
            });

            if (!response.ok) throw new Error('Error al generar el reporte en el servidor.');

            const blob = await response.blob();
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `${filename}.${format}`;
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            a.remove();
        } catch (error) {
            console.error('Report Error:', error);
            alert('Error en la comunicación con el servidor de reportes.');
        }
    }

    /**
     * Generate PDF report
     */
    async function generatePDF(title, headers, rows, filename) {
        await generateReport('pdf', title, headers, rows, filename);
    }

    /**
     * Generate XLSX report
     */
    async function generateXLSX(title, headers, rows, filename) {
        await generateReport('xlsx', title, headers, rows, filename);
    }

    /**
     * Generate DOCX report
     */
    async function generateDOCX(title, headers, rows, filename) {
        await generateReport('docx', title, headers, rows, filename);
    }

    /**
     * Show export format picker dropdown (Legacy support if needed)
     */
    function showFormatPicker(button, exportFn) {
        document.querySelectorAll('.macuin-export-dropdown').forEach(d => d.remove());

        const dropdown = document.createElement('div');
        dropdown.className = 'macuin-export-dropdown';
        dropdown.style.cssText = `
            position: absolute; right: 0; top: 100%; margin-top: 4px;
            background: #1a1c2e; border: 1px solid rgba(255,179,177,0.2);
            z-index: 9999; min-width: 180px; box-shadow: 0 8px 32px rgba(0,0,0,0.5);
        `;

        const formats = [
            { key: 'pdf', icon: 'picture_as_pdf', label: 'PDF', color: '#ee3f4b' },
            { key: 'xlsx', icon: 'table_chart', label: 'Excel (XLSX)', color: '#22c55e' },
            { key: 'docx', icon: 'description', label: 'Word (DOCX)', color: '#3b82f6' }
        ];

        dropdown.innerHTML = formats.map(f => `
            <button class="w-full flex items-center gap-3 px-4 py-3 hover:bg-[#2a2c3e] transition-colors text-left"
                    data-format="${f.key}">
                <span class="material-symbols-outlined" style="color:${f.color};font-size:18px">${f.icon}</span>
                <span class="text-xs font-bold uppercase tracking-widest text-[#c2c6d3]">${f.label}</span>
            </button>
        `).join('');

        button.style.position = 'relative';
        button.parentElement.style.position = 'relative';
        button.parentElement.appendChild(dropdown);

        dropdown.querySelectorAll('button').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const format = btn.dataset.format;
                dropdown.remove();
                exportFn(format);
            });
        });

        setTimeout(() => {
            document.addEventListener('click', function handler(e) {
                if (!dropdown.contains(e.target)) {
                    dropdown.remove();
                    document.removeEventListener('click', handler);
                }
            });
        }, 10);
    }

    return { generatePDF, generateXLSX, generateDOCX, showFormatPicker };
})();

window.Reportes = Reportes;
