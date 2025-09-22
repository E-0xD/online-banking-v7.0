<script>
    // document.addEventListener('DOMContentLoaded', () => {
    //     const form = document.getElementById('updateForm');
    //     const messageBox = document.getElementById('updateMessage');

    //     if (!form) return;

    //     form.addEventListener('submit', async (e) => {
    //         e.preventDefault();
    //         const url = form.action;
    //         const formData = new FormData(form);

    //         // Add PUT method override for Laravel
    //         formData.append('_method', 'PUT');

    //         try {
    //             const response = await fetch(url, {
    //                 method: 'POST',
    //                 headers: {
    //                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
    //                         .content,
    //                     'Accept': 'application/json', // Force Laravel to return JSON
    //                     'X-Requested-With': 'XMLHttpRequest'
    //                 },
    //                 body: formData
    //             });

    //             const data = await response.json(); // <-- Will fail if server returns HTML
    //             messageBox.innerHTML = `<div class="alert alert-success">${data.message}</div>`;

    //             // 🔄 Reload the page after 1.5 seconds
    //             setTimeout(() => {
    //                 location.reload();
    //             }, 1500);
    //         } catch (err) {
    //             // Try to show raw response if JSON parse failed
    //             messageBox.innerHTML = `<div class="alert alert-danger">
    //     ${err.message.includes('Unexpected token') ? 'Server returned HTML instead of JSON. Check route/CSRF.' : err.message}
    //   </div>`;
    //         }
    //     });
    // });

    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('updateForm');
        if (!form) {
            console.error('updateForm element not found in DOM.');
            return;
        }

        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const url = form.getAttribute('action');
            const formData = new FormData(form);
            // formData.append('_method', 'PUT'); // Laravel method spoofing for PUT

            try {
                const response = await fetch(url, {
                    method: 'POST', // still POST for PUT spoofing
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .content,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                });

                const data = await response.json();

                if (!response.ok) {
                    let errors = '';
                    if (data.errors) {
                        for (const key in data.errors) {
                            errors += `<li>${data.errors[key][0]}</li>`;
                        }
                    }
                    throw new Error(errors || data.message || 'Update failed');
                }

                // ✅ Show success message
                document.getElementById('updateMessage').innerHTML =
                    `<div class="alert alert-success">${data.message}</div>`;

                // 🔄 Reload the page after 1.5 seconds
                setTimeout(() => {
                    location.reload();
                }, 1500);

            } catch (err) {
                // ❌ Show error message
                document.getElementById('updateMessage').innerHTML =
                    `<div class="alert alert-danger">${err.message}</div>`;
            }
        });
    });
</script>
