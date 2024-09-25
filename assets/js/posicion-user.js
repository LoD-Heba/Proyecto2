    // Función para resaltar la categoría actual
    const highlightCategory = () => {
        const currentPage = window.location.pathname.split('/').pop(); // Obtiene el nombre del archivo actual
        const categories = {
            'plantas_interior.php': 'interior',
            'plantas_exterior.php': 'exterior',
            'flores.php': 'flores',
            'arbustos.php': 'arbustos',
        };

        const categoryKey = categories[currentPage];

        if (categoryKey) {
            const activeCard = document.querySelector(`.card-category[data-category="${categoryKey}"]`);
            if (activeCard) {
                activeCard.classList.add('active');
            }
        }
    };

    window.onload = highlightCategory;