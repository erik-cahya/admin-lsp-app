<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        .item {
            padding: 10px;
            margin: 5px;
            background: #f0f0f0;
            border-radius: 5px;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .hidden {
            opacity: 0;
            transform: scale(0.9);
            height: 0;
            padding: 0;
            margin: 0;
            overflow: hidden;
        }
        
        #search {
            padding: 10px;
            width: 100%;
            margin-bottom: 20px;
            font-size: 16px;
        }
    </style>

    <input type="text" id="search" placeholder="Cari...">
        

    <div id="container-card">
        <div class="item" data-name="apel">Apel</div>
        <div class="item" data-name="pisang">Pisang</div>
        <div class="item" data-name="mangga">Mangga</div>
        <div class="item" data-name="jeruk">Jeruk</div>
        <div class="item" data-name="anggur">Anggur</div>
        <div class="item" data-name="semangka">Semangka</div>
        <div class="item" data-name="melon">Melon</div>
        <div class="item" data-name="pepaya">Pepaya</div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const container = document.getElementById('container-card');
            const items = Array.from(document.querySelectorAll('.item'));
            
            let currentFilter = '*';
            let currentSort = 'default';
            
            // Fungsi untuk memfilter dan menampilkan item
            function filterAndSortItems() {
                const searchTerm = searchInput.value.toLowerCase();
                
                items.forEach(item => {
                    const matchesSearch = item.dataset.name.toLowerCase().includes(searchTerm);
                    const matchesFilter = currentFilter === '*' || item.classList.contains(currentFilter.substring(1));
                    
                    if (matchesSearch && matchesFilter) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
                
                // Proses sorting
                const visibleItems = items.filter(item => !item.classList.contains('hidden'));
                
                if (currentSort === 'random') {
                    visibleItems.sort(() => Math.random() - 0.5);
                } else {
                    // Default sort (by original order)
                    visibleItems.sort((a, b) => 
                        Array.from(container.children).indexOf(a) - 
                        Array.from(container.children).indexOf(b)
                    );
                }
                
                // Reorder DOM
                visibleItems.forEach(item => container.appendChild(item));
            }
            
            // Event listener untuk search
            searchInput.addEventListener('input', filterAndSortItems);
            
            
            // Inisialisasi awal
            filterAndSortItems();
        });
    </script>
</body>
</html>