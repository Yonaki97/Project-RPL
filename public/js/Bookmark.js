console.log('=== Bookmark Script Starting ===');

(function() {
    'use strict';
    
    let isProcessing = false;
    
    // Gunakan event delegation
    document.addEventListener('click', function(e) {
        const bookmarkBtn = e.target.closest('.bookmark-btn');
        
        if (bookmarkBtn && !isProcessing) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            
            isProcessing = true;
            console.log('✅ Bookmark button clicked!');
            
            // Disable button sementara
            bookmarkBtn.disabled = true;
            bookmarkBtn.style.opacity = '0.5';
            
            const catatanId = bookmarkBtn.dataset.catatanId;
            const isBookmarked = bookmarkBtn.dataset.bookmarked === 'true';
            
            console.log('Catatan ID:', catatanId, 'Currently bookmarked:', isBookmarked);
            
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                alert('CSRF token not found!');
                resetButton(bookmarkBtn);
                return;
            }
            
            // Kirim request
            fetch(`/catatan/${catatanId}/bookmark`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken.content,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                console.log('Response status:', response.status);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('✅ Success:', data);
                
                // Update icon - karena pakai <img>, ubah src atau filter
                const icon = bookmarkBtn.querySelector('.bookmarkIcon');
                const countSpan = bookmarkBtn.closest('.flex').querySelector('.bookmark-count');
                
                // Di bagian update icon
                    if (icon) {
                        if (data.bookmarked) {
                            // Bookmark aktif
                            icon.style.filter = 'brightness(0) saturate(100%) invert(59%) sepia(98%) saturate(1614%) hue-rotate(158deg) brightness(97%) contrast(92%)';
                            icon.classList.add('bookmarked');
                        } else {
                            // Bookmark tidak aktif
                            icon.style.filter = 'brightness(0) saturate(100%) invert(62%) sepia(4%) saturate(435%) hue-rotate(182deg) brightness(93%) contrast(87%)';
                            icon.classList.remove('bookmarked');
                        }
                    }
                
                // Update dataset
                bookmarkBtn.dataset.bookmarked = data.bookmarked ? 'true' : 'false';
                
                // Update count
                if (countSpan) {
                    countSpan.textContent = data.count;
                }

                // Update data-is-bookmarked di card wrapper
                    const cardWrapper = bookmarkBtn.closest('[data-catatan-card]');
                    if (cardWrapper) {
                        cardWrapper.dataset.isBookmarked = data.bookmarked ? 'true' : 'false';
                    }

                    // Jika filter aktif dan user unbookmark, hide card
                    const filterBtn = document.getElementById('toggleBookmarkFilter');
                    if (filterBtn && filterBtn.dataset.active === 'true' && !data.bookmarked) {
                        setTimeout(() => {
                            if (cardWrapper) {
                                cardWrapper.style.display = 'none';
                            }
                            
                            // Cek apakah masih ada catatan bookmark yang visible
                            const visibleBookmarked = document.querySelectorAll('[data-catatan-card][data-is-bookmarked="true"][style*="display: block"]');
                            if (visibleBookmarked.length === 0) {
                                // Tampilkan pesan kosong
                                const message = document.createElement('div');
                                message.className = 'empty-bookmark-message bg-white rounded-2xl border border-[#4ED7F1]/30 shadow-sm p-12 text-center';
                                message.innerHTML = `
                                    <svg class="w-16 h-16 mx-auto mb-4 opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: #9CA3AF;">
                                        <path d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3 7 3V5c0-1.1-.9-2-2-2z"/>
                                    </svg>
                                    <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Catatan yang Di-bookmark</h3>
                                    <p class="text-gray-500">Klik ikon bookmark pada catatan untuk menyimpannya di sini</p>
                                `;
                                document.querySelector('main').appendChild(message);
                            }
                        }, 300);
                    }

                
                // Show notification
                showNotification(data.message);
                
                // Re-enable button setelah 1 detik (lebih aman)
                setTimeout(() => {
                    resetButton(bookmarkBtn);
                }, 1000);
            })
            .catch(error => {
                console.error('❌ Error:', error);
                showNotification('Terjadi kesalahan: ' + error.message, 'error');
                resetButton(bookmarkBtn);
            });
        }
    }, true);
    
    function resetButton(btn) {
        isProcessing = false;
        btn.disabled = false;
        btn.style.opacity = '1';
    }
    
    function showNotification(message, type = 'success') {
        // Hapus notifikasi lama kalau ada
        const oldNotif = document.querySelector('.bookmark-notification');
        if (oldNotif) oldNotif.remove();
        
        const notification = document.createElement('div');
        notification.className = `bookmark-notification fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 ${
            type === 'success' ? 'bg-green-500' : 'bg-red-500'
        } text-white transition-all`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => notification.remove(), 300);
        }, 2000);
    }
    
    console.log('=== Bookmark Script Ready ===');
})();