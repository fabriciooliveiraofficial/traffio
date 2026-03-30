@echo off
echo ========================================================
echo   Traffio Odonto - Servidor de Testes Local (PHP)
echo ========================================================
echo.
echo Iniciando servidor em http://localhost:8000...
echo.
echo DICA: Nao feche esta janela enquanto estiver testando.
echo Pressione Ctrl+C para encerrar.
echo.
start http://localhost:8000
php -S localhost:8000
