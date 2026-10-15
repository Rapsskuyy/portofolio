document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-public-form]').forEach((form) => {
        const submitButton = form.querySelector('[type="submit"]');
        const status = form.querySelector('[data-form-status]');

        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            if (!submitButton || !status) return;

            submitButton.disabled = true;
            submitButton.setAttribute('aria-busy', 'true');
            status.className = 'public-form-status';
            status.textContent = 'Mengirim pesan...';

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: { Accept: 'application/json' },
                    body: new FormData(form),
                });
                const payload = await response.json();

                if (!response.ok) {
                    const errors = Object.values(payload.errors || {}).flat().join(' ');
                    throw new Error(errors || payload.message || 'Pesan belum dapat dikirim.');
                }

                form.reset();
                status.className = 'public-form-status is-success';
                status.textContent = payload.message;
            } catch (error) {
                status.className = 'public-form-status is-error';
                status.textContent = error instanceof Error ? error.message : 'Pesan belum dapat dikirim.';
            } finally {
                submitButton.disabled = false;
                submitButton.removeAttribute('aria-busy');
            }
        });
    });
});
