/**
 * MACUIN ADMIN — Report Generation Module
 * Generates PDF, XLSX, and DOCX reports from filtered table data.
 * Dependencies loaded dynamically from CDN on first use.
 */

const Reportes = (() => {
    // CDN URLs for libraries (loaded on demand)
    const LIBS = {
        jspdf: 'https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js',
        jspdf_autotable: 'https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.2/jspdf.plugin.autotable.min.js',
        xlsx: 'https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js',
        docx: 'https://unpkg.com/docx@8.5.0/build/index.umd.js',
        filesaver: 'https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js'
    };

    const loaded = {};

    function loadScript(url) {
        if (loaded[url]) return loaded[url];
        loaded[url] = new Promise((resolve, reject) => {
            const s = document.createElement('script');
            s.src = url;
            s.onload = resolve;
            s.onerror = reject;
            document.head.appendChild(s);
        });
        return loaded[url];
    }

    async function ensurePDF() {
        await loadScript(LIBS.jspdf);
        await loadScript(LIBS.jspdf_autotable);
    }

    async function ensureXLSX() {
        await loadScript(LIBS.xlsx);
    }

    async function ensureDOCX() {
        await loadScript(LIBS.filesaver);
        await loadScript(LIBS.docx);
    }

    /**
     * Generate PDF report
     * @param {string} title - Report title
     * @param {string[]} headers - Column headers
     * @param {string[][]} rows - Row data
     * @param {string} filename - Output filename (without extension)
     */
    async function generatePDF(title, headers, rows, filename) {
        await ensurePDF();
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF({ orientation: rows[0] && rows[0].length > 5 ? 'landscape' : 'portrait' });

        // Header
        doc.setFontSize(18);
        doc.setFont('helvetica', 'bold');
        doc.text('MACUIN INDUSTRIAL', 14, 18);
        doc.setFontSize(12);
        doc.setFont('helvetica', 'normal');
        doc.text(title, 14, 26);
        doc.setFontSize(8);
        doc.setTextColor(120);
        doc.text(`Generado: ${new Date().toLocaleString('es-MX')}`, 14, 32);
        doc.text(`Total registros: ${rows.length}`, 14, 37);
        doc.setTextColor(0);

        // Table
        doc.autoTable({
            head: [headers],
            body: rows,
            startY: 42,
            theme: 'grid',
            headStyles: {
                fillColor: [4, 19, 41],
                textColor: [255, 179, 177],
                fontStyle: 'bold',
                fontSize: 8
            },
            bodyStyles: { fontSize: 7 },
            alternateRowStyles: { fillColor: [245, 245, 250] },
            styles: { cellPadding: 3 }
        });

        doc.save(`${filename}.pdf`);
    }

    /**
     * Generate XLSX report
     */
    async function generateXLSX(title, headers, rows, filename) {
        await ensureXLSX();

        const wsData = [
            ['MACUIN INDUSTRIAL'],
            [title],
            [`Generado: ${new Date().toLocaleString('es-MX')}`],
            [],
            headers,
            ...rows
        ];

        const ws = XLSX.utils.aoa_to_sheet(wsData);

        // Column widths
        ws['!cols'] = headers.map((h, i) => ({
            wch: Math.max(h.length, ...rows.map(r => (r[i] || '').toString().length)) + 4
        }));

        // Merge title row
        ws['!merges'] = [
            { s: { r: 0, c: 0 }, e: { r: 0, c: headers.length - 1 } },
            { s: { r: 1, c: 0 }, e: { r: 1, c: headers.length - 1 } },
            { s: { r: 2, c: 0 }, e: { r: 2, c: headers.length - 1 } }
        ];

        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, 'Reporte');
        XLSX.writeFile(wb, `${filename}.xlsx`);
    }

    /**
     * Generate DOCX report
     */
    async function generateDOCX(title, headers, rows, filename) {
        await ensureDOCX();
        const { Document, Packer, Paragraph, Table, TableRow, TableCell, 
                TextRun, WidthType, AlignmentType, BorderStyle, HeadingLevel } = window.docx;

        const headerCells = headers.map(h => new TableCell({
            children: [new Paragraph({
                children: [new TextRun({ text: h, bold: true, size: 16, color: 'FFB3B1', font: 'Arial' })],
                alignment: AlignmentType.CENTER
            })],
            shading: { fill: '041329' }
        }));

        const dataRows = rows.map(row => new TableRow({
            children: row.map(cell => new TableCell({
                children: [new Paragraph({
                    children: [new TextRun({ text: String(cell || ''), size: 16, font: 'Arial' })]
                })]
            }))
        }));

        const table = new Table({
            rows: [new TableRow({ children: headerCells }), ...dataRows],
            width: { size: 100, type: WidthType.PERCENTAGE }
        });

        const doc = new Document({
            sections: [{
                children: [
                    new Paragraph({
                        children: [new TextRun({ text: 'MACUIN INDUSTRIAL', bold: true, size: 32, font: 'Arial' })],
                        heading: HeadingLevel.HEADING_1
                    }),
                    new Paragraph({
                        children: [new TextRun({ text: title, size: 24, font: 'Arial' })]
                    }),
                    new Paragraph({
                        children: [new TextRun({
                            text: `Generado: ${new Date().toLocaleString('es-MX')} | Total registros: ${rows.length}`,
                            size: 16, color: '888888', font: 'Arial'
                        })]
                    }),
                    new Paragraph({ text: '' }),
                    table
                ]
            }]
        });

        const blob = await Packer.toBlob(doc);
        window.saveAs(blob, `${filename}.docx`);
    }

    /**
     * Show export format picker dropdown
     * @param {HTMLElement} button - The button that triggered the dropdown
     * @param {Function} exportFn - Called with format string ('pdf'|'xlsx'|'docx')
     */
    function showFormatPicker(button, exportFn) {
        // Remove any existing dropdown
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

        // Position relative to button
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

        // Close on outside click
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
