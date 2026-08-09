const modalRoot = document.createElement('div');
modalRoot.id = 'modal-root';
document.body.appendChild(modalRoot);

export function openModal({ title = '', body = '', onConfirm = null, confirmText = 'Guardar', cancelText = 'Cancelar' }) {
  modalRoot.innerHTML = `
    <div class="modal-backdrop fixed inset-0 z-50 flex items-center justify-center bg-gray-900/50 p-4">
      <div class="modal-box w-full max-w-md rounded-lg bg-white p-6 shadow-xl">
        <div class="mb-4 flex items-center justify-between">
          <h3 class="modal-title text-xl font-bold text-gray-800"></h3>
          <button type="button" class="modal-close flex h-8 w-8 items-center justify-center rounded-full text-gray-500 transition hover:bg-gray-200 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer mt-6 flex justify-end gap-3">
          <button type="button" class="modal-cancel rounded-lg border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 transition hover:bg-gray-100"></button>
          <button type="button" class="modal-confirm rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-500"></button>
        </div>
      </div>
    </div>`;

  modalRoot.querySelector('.modal-title').textContent = title;
  modalRoot.querySelector('.modal-cancel').textContent = cancelText;
  modalRoot.querySelector('.modal-confirm').textContent = confirmText;

  const backdrop = modalRoot.querySelector('.modal-backdrop');
  const box = modalRoot.querySelector('.modal-box');
  const bodyEl = modalRoot.querySelector('.modal-body');

  bodyEl.innerHTML = body;

  backdrop.addEventListener('click', (e) => {
    if (e.target === backdrop) closeModal();
  });
  modalRoot.querySelector('.modal-close').addEventListener('click', closeModal);
  modalRoot.querySelector('.modal-cancel').addEventListener('click', closeModal);

  const form = bodyEl.querySelector('form');
  modalRoot.querySelector('.modal-confirm').addEventListener('click', () => {
    if (form) {
      form.requestSubmit();
    } else if (onConfirm) {
      onConfirm();
    }
  });

  form?.addEventListener('submit', (e) => {
    e.preventDefault();
    const data = Object.fromEntries(new FormData(form));
    onConfirm?.(data, e);
    closeModal();
  });
}

export function closeModal() {
  modalRoot.innerHTML = '';
}
