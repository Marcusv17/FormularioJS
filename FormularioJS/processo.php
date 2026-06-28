<?php
$nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
$curso = isset($_POST['curso']) ? trim($_POST['curso']) : 'não informado';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$telefone = isset($_POST['telefone']) ? trim($_POST['telefone']) : '';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Confirmação</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #fffafa 0%, #f0f8ff 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .box {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            animation: bounceIn 1s;
        }

        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }

        h1 {
            color: #b02a37;
        }

        .fa-check-circle {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .fa-check-circle {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
s
    </style>
</head>

<body>

    <div class="box">
        <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
        <h1>Olá, <?php echo $nome; ?>!</h1>

        <p>
            Email -  <strong><?php echo $email; ?></strong>.
        </p>

        <p>
            Telefone -  <strong><?php echo $telefone; ?></strong>.
        </p>

        <p>
            Você foi matriculado no curso de <strong><?php echo $curso; ?></strong>.
        </p>

        <p>Muito obrigado pela mensagem! </p>

        <a href="index.html" class="btn btn-danger mt-3">Voltar ao site</a>
    </div>

    <footer class="text-white pt-4 mt-5 w-100">
        <div class="container-fluid px-3 px-md-5">
            <div class="row">

                <div class="col-md-3">
                    <h5>ETEC Zona Leste</h5>
                    <p>Ensino técnico de qualidade.</p>
                </div>

                <div class="col-md-3">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Início</a></li>
                        <li><a href="quemSomos.html" class="text-white">Quem Somos</a></li>
                        <li><a href="vestibulinho.html" class="text-white">Vestibulinho</a></li>
                        <li><a href="formulario.html" class="text-white">Formulário</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h5>Contato</h5>
                    <p><i class="fas fa-map-marker-alt"></i> São Paulo - SP</p>
                    <p><i class="fas fa-phone"></i> (11) 0000-0000</p>
                    <p><i class="fas fa-envelope"></i> etec@email.com</p>
                </div>

                <div class="col-md-3">
                    <h5>Horário</h5>
                    <p><i class="fas fa-clock"></i> Seg - Sex: 08h às 22h</p>
                    <p>Sábado: 08h às 12h</p>


                    <h5 class="mt-3">Redes</h5>
                    <a href="https://www.facebook.com/Eteczonalesteoficial/?locale=pt_BR" class="text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Visite nosso Facebook"><i class="fab fa-facebook"></i> Facebook</a><br>
                    <a href="https://www.instagram.com/eteczonalesteoficial" class="text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Siga-nos no Instagram"><i class="fab fa-instagram"></i> Instagram</a><br>
                    <a href="https://www.youtube.com/@etecdazonaleste2949" class="text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Assista nossos vídeos"><i class="fab fa-youtube"></i> YouTube</a>
                </div>

            </div>

            <hr>

            <div class="text-center pb-3">
                © 2026 ETEC Zona Leste
            </div>
        </div>
    </footer>

    <button id="backToTop" class="btn btn-danger rounded-circle p-3" style="position: fixed; bottom: 20px; right: 20px; display: none; z-index: 1000;" data-bs-toggle="tooltip" title="Voltar ao topo"><i class="fas fa-arrow-up"></i></button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Back to top button
        const backToTopBtn = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 200) {
                backToTopBtn.style.display = 'block';
            } else {
                backToTopBtn.style.display = 'none';
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>

</body>

</html>