console.log('=== Like Script Starting ===');

(function() {
    'use strict';
    
    let isProcessing = false;
    
    // Gunakan event delegation
    document.addEventListener('click', function(e) {
        const likeBtn = e.target.closest('.like-btn');
        
        if (likeBtn && !isProcessing) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            
            isProcessing = true;
            console.log('✅ Like button clicked!');
            
            // Disable button sementara
            likeBtn.disabled = true;
            likeBtn.style.opacity = '0.5';
            
            const catatanId = likeBtn.dataset.catatanId;
            const isLiked = likeBtn.dataset.liked === 'true';
            
            console.log('Catatan ID:', catatanId, 'Currently liked:', isLiked);
            
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                alert('CSRF token not found!');
                resetButton(likeBtn);
                return;
            }
            
            // Kirim request
            fetch(`/catatan/${catatanId}/like`, {
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
                
                // Update icon
                const icon = likeBtn.querySelector('.likeIcon');
                const countSpan = likeBtn.closest('.flex').querySelector('.like-count');
                
                if (icon) {
                    if (icon.tagName === 'svg') {
                        // SVG icon
                        if (data.liked) {
                            icon.style.fill = '#EF4444'; // Red
                            // Animasi scale
                            icon.style.transform = 'scale(1.2)';
                            setTimeout(() => {
                                icon.style.transform = 'scale(1)';
                            }, 200);
                        } else {
                            icon.style.fill = '#9CA3AF'; // Gray
                        }
                    } else {
                        // IMG icon
                        if (data.liked) {
                            icon.style.filter = 'brightness(0) saturate(100%) invert(32%) sepia(95%) saturate(2878%) hue-rotate(346deg) brightness(95%) contrast(92%)';
                            icon.classList.add('liked');
                        } else {
                            icon.style.filter = 'none';
                            icon.classList.remove('liked');
                        }
                    }
                }
                
                // Update dataset
                likeBtn.dataset.liked = data.liked ? 'true' : 'false';
                
                // Update count dengan animasi
                if (countSpan) {
                    countSpan.style.transform = 'scale(1.3)';
                    countSpan.textContent = data.count;
                    setTimeout(() => {
                        countSpan.style.transform = 'scale(1)';
                    }, 200);
                }
                
                // Update data-is-liked di card wrapper (untuk sinkronisasi)
                const cardWrapper = likeBtn.closest('[data-catatan-card]');
                if (cardWrapper) {
                    cardWrapper.dataset.isLiked = data.liked ? 'true' : 'false';
                }
                
                // Show notification
                showNotification(data.message);
                
                // Re-enable button setelah 500ms
                setTimeout(() => {
                    resetButton(likeBtn);
                }, 500);
            })
            .catch(error => {
                console.error('❌ Error:', error);
                showNotification('Terjadi kesalahan: ' + error.message, 'error');
                resetButton(likeBtn);
            });
        }
    }, true);
    
    function resetButton(btn) {
        isProcessing = false;
        btn.disabled = false;
        btn.style.opacity = '1';
    }
    
    function showNotification(message, type = 'success') {
        // Hapus notifikasi lama
        const oldNotif = document.querySelector('.like-notification');
        if (oldNotif) oldNotif.remove();
        
        const notification = document.createElement('div');
        notification.className = `like-notification fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 ${
            type === 'success' ? 'bg-green-500' : 'bg-red-500'
        } text-white transition-all`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => notification.remove(), 300);
        }, 2000);
    }
    
    console.log('=== Like Script Ready ===');
})();

// CSS untuk transisi smooth
const style = document.createElement('style');
style.textContent = `
    .likeIcon {
        transition: all 0.2s ease;
    }
    .like-count {
        transition: all 0.2s ease;
    }
`;
document.head.appendChild(style);