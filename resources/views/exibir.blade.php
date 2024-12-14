<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir PDF</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- PDF.js (Versão 2.16.105) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <script>
        pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js";
    </script>
    <style>
        body {
            background-color: #000; /* Fundo preto */
            color: #00ffff; /* Verde água */
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        #viewerContainer {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%; /* Ocupa toda a largura da tela */
            height: 100vh; /* Altura igual à altura da tela */
            padding: 10px; /* Padding para não colar nas bordas */
            box-sizing: border-box; /* Para não ultrapassar o limite de largura */
        }
        #pdfViewer {
            border: 1px solid #ccc;
            background-color: #fff;
            width: 50%; /* A largura será ajustada para o tamanho da tela */
            height: 100%; /* A altura será ajustada para o tamanho da tela */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #pdfCanvas {
            width: 100%; /* Faz o PDF ocupar toda a largura disponível */
            height: 100%; /* Faz o PDF ocupar toda a altura disponível */
            object-fit: contain; /* Faz o conteúdo se ajustar ao tamanho da tela */
        }
        .controls {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-left: 20px;
        }
        .controls button {
            background-color: #00ffff; /* Verde água */
            color: #000;
            border: none;
            padding: 10px 20px;
            margin: 10px 0;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        .controls button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div id="viewerContainer">
        <!-- PDF Canvas -->
        <div id="pdfViewer">
            <canvas id="pdfCanvas"></canvas>
        </div>

        <!-- Controles de Navegação -->
        <div class="controls">
            <button id="prevPage">Página Anterior</button>
            <span id="pageInfo">Carregando...</span>
            <button id="nextPage">Próxima Página</button>
        </div>
    </div>

    <script>
        const pdfUrl = "{{ asset('storage/' . $livro->arquivo) }}";
        let pdfDoc = null;
        let currentPage = 1;
        let totalPages = 0;
        const scale = 1.5; // Ajuste a escala do PDF para ser maior

        const pdfCanvas = document.getElementById('pdfCanvas');
        const ctx = pdfCanvas.getContext('2d');
        const pageInfo = document.getElementById('pageInfo');
        const prevPageBtn = document.getElementById('prevPage');
        const nextPageBtn = document.getElementById('nextPage');

        // Função para renderizar uma página
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

        // Navegar para a página anterior
        prevPageBtn.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                renderPage(currentPage);
            }
        });

        // Navegar para a próxima página
        nextPageBtn.addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage++;
                renderPage(currentPage);
            }
        });
    </script>
</body>
</html>
