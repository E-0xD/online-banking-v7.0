<script>
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

            try {
                const response = await fetch(url, {
                    method: 'POST',
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
                            // errors += `<li>${data.errors[key][0]}</li>`;
                            errors += `${data.errors[key][0]}</br>`;
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
