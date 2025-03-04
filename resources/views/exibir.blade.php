<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Exibir PDF</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js";
    </script>
    <style>
        body {
            margin: 0;
            background-color: #000; /* Fundo preto */
            color: #00ffff; /* Verde água */
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden; /* Impede rolagem */
        }

        #viewerContainer {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            box-sizing: border-box;
            padding-bottom: 40px; /* Reduzido para dar mais espaço ao PDF */
        }

        #pdfViewer {
            width: 100%;
            height: calc(100% - 80px); /* Ajuste para o PDF ocupar mais espaço */
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
        }

        #pdfCanvas {
            width: 100%;
            height: auto;
            object-fit: contain;
        }

        #controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 10px; /* Diminuído para botões menores */
            background-color: #000;
            color: #00ffff;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 100;
        }

        #controls button {
            background-color: #00ffff;
            color: #000;
            border: none;
            padding: 8px 16px; /* Botões menores */
            font-size: 14px; /* Fontes menores */
            border-radius: 5px;
            cursor: pointer;
        }

        #controls button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        #pageInfo {
            flex: 1;
            text-align: center;
            font-size: 14px; /* Tamanho do texto ajustado */
        }
    </style>
</head>
<body>
    <!-- Contêiner do Visualizador -->
    <div id="viewerContainer">
        <div id="pdfViewer">
            <canvas id="pdfCanvas"></canvas>
        </div>
    </div>

    <!-- Controles de Navegação -->
    <div id="controls">
        <button id="prevPage">Página Anterior</button>
        <span id="pageInfo">Carregando...</span>
        <button id="nextPage">Próxima Página</button>
    </div>

    <script>
        const pdfUrl = "{{ asset('storage/' . $livro->arquivo) }}";
        let pdfDoc = null;
        let currentPage = 1;
        let totalPages = 0;
        const scale = 2.0; // Aumentado para 2.0 para melhorar a legibilidade

        const pdfCanvas = document.getElementById('pdfCanvas');
        const ctx = pdfCanvas.getContext('2d');
        const pageInfo = document.getElementById('pageInfo');
        const prevPageBtn = document.getElementById('prevPage');
        const nextPageBtn = document.getElementById('nextPage');

        // Renderiza a página
        function renderPage(pageNum) {
            pdfDoc.getPage(pageNum).then(page => {
                const viewport = page.getViewport({ scale });
                pdfCanvas.height = viewport.height;
                pdfCanvas.width = viewport.width;

                const renderContext = {
                    canvasContext: ctx,
                    viewport: viewport,
                };

                page.render(renderContext).promise.then(() => {
                    pageInfo.textContent = `Página ${currentPage} de ${totalPages}`;
                    prevPageBtn.disabled = currentPage <= 1;
                    nextPageBtn.disabled = currentPage >= totalPages;
                });
            });
        }

        // Carrega o documento PDF
        pdfjsLib.getDocument(pdfUrl).promise.then(pdf => {
            pdfDoc = pdf;
            totalPages = pdf.numPages;
            renderPage(currentPage);
        }).catch(error => {
            console.error("Erro ao carregar o PDF:", error);
            pageInfo.textContent = "Erro ao carregar o PDF.";
        });

        // Botão de Página Anterior
        prevPageBtn.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                renderPage(currentPage);
            }
        });

        // Botão de Próxima Página
        nextPageBtn.addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage++;
                renderPage(currentPage);
            }
        });
    </script>
</body>
</html>
