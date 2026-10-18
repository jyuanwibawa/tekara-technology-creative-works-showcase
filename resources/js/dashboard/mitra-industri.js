document.addEventListener('DOMContentLoaded', () => {
    const partnerModal = document.getElementById('partner-modal');
    const deleteModal = document.getElementById('partner-delete-modal');
    const partnerForm = document.getElementById('partner-form');
    const deleteForm = document.getElementById('partner-delete-form');
    const nameInput = document.getElementById('partner-name');
    const typeInput = document.getElementById('partner-type');
    const contactInput = document.getElementById('partner-contact');
    const addressInput = document.getElementById('partner-address');
    const formMethod = document.getElementById('partner-form-method');
    const formId = document.getElementById('partner-form-id');
    const searchInput = document.getElementById('partner-search');
    const typeFilter = document.getElementById('partner-type-filter');
    const accountFilter = document.getElementById('partner-account-filter');
    const sortSelect = document.getElementById('partner-sort');
    const rows = Array.from(document.querySelectorAll('.partner-table-row'));
    const noResults = document.getElementById('partner-no-results');
    const summaryCount = document.getElementById('partner-summary-count');
    const exportButton = document.getElementById('btn-export-partners');

    const showModal = (modal) => {
        modal?.classList.remove('hidden');
        modal?.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    };

    const hideModal = (modal) => {
        modal?.classList.add('hidden');
        modal?.classList.remove('flex');
        if (partnerModal?.classList.contains('hidden') && deleteModal?.classList.contains('hidden')) {
            document.body.classList.remove('overflow-hidden');
        }
    };

    const openCreateModal = () => {
        partnerForm?.reset();
        partnerForm.action = partnerForm.dataset.createUrl;
        formMethod.value = '';
        formId.value = '';
        document.getElementById('partner-modal-title').textContent = 'Tambah Mitra Industri';
        showModal(partnerModal);
        nameInput?.focus();
    };

    document.getElementById('btn-open-partner-modal')?.addEventListener('click', openCreateModal);
    document.getElementById('partner-modal-close')?.addEventListener('click', () => hideModal(partnerModal));
    document.getElementById('partner-modal-cancel')?.addEventListener('click', () => hideModal(partnerModal));
    document.getElementById('partner-delete-cancel')?.addEventListener('click', () => hideModal(deleteModal));

    document.querySelectorAll('[data-edit-partner]').forEach((button) => {
        button.addEventListener('click', () => {
            const row = button.closest('.partner-table-row');
            if (!row || !partnerForm) return;

            partnerForm.action = button.dataset.updateUrl;
            formMethod.value = 'PUT';
            formId.value = row.dataset.id;
            nameInput.value = row.dataset.name ?? '';
            typeInput.value = row.dataset.type ?? '';
            contactInput.value = row.dataset.contact ?? '';
            addressInput.value = row.dataset.address ?? '';
            document.getElementById('partner-modal-title').textContent = 'Ubah Data Mitra';
            showModal(partnerModal);
            nameInput.focus();
        });
    });

    document.querySelectorAll('[data-delete-partner]').forEach((button) => {
        button.addEventListener('click', () => {
            deleteForm.action = button.dataset.deleteUrl;
            document.getElementById('partner-delete-name').textContent = button.dataset.partnerName ?? '';
            showModal(deleteModal);
        });
    });

    [partnerModal, deleteModal].forEach((modal) => {
        modal?.addEventListener('click', (event) => {
            if (event.target === modal) hideModal(modal);
        });
    });

    const sortRows = () => {
        const body = document.getElementById('partner-table-body');
        const sort = sortSelect?.value ?? 'updated';
        const sorted = [...rows].sort((left, right) => {
            if (sort === 'name') return (left.dataset.name ?? '').localeCompare(right.dataset.name ?? '');
            const leftTimestamp = Number(left.dataset[sort === 'oldest' ? 'created' : 'updated'] ?? 0);
            const rightTimestamp = Number(right.dataset[sort === 'oldest' ? 'created' : 'updated'] ?? 0);
            return sort === 'oldest' ? leftTimestamp - rightTimestamp : rightTimestamp - leftTimestamp;
        });
        sorted.forEach((row) => body?.insertBefore(row, noResults));
    };

    const applyFilters = () => {
        const query = searchInput?.value.trim().toLocaleLowerCase() ?? '';
        const type = typeFilter?.value ?? '';
        const account = accountFilter?.value ?? '';
        let visible = 0;

        rows.forEach((row) => {
            const matches = (!query || row.dataset.search?.includes(query))
                && (!type || row.dataset.type === type)
                && (!account || row.dataset.account === account);

            row.classList.toggle('hidden', !matches);
            if (matches) visible += 1;
        });

        if (summaryCount) summaryCount.textContent = String(visible);
        if (noResults) noResults.classList.toggle('hidden', rows.length === 0 || visible > 0);
    };

    searchInput?.addEventListener('input', applyFilters);
    [typeFilter, accountFilter].forEach((filter) => filter?.addEventListener('change', applyFilters));
    sortSelect?.addEventListener('change', sortRows);

    document.getElementById('partner-reset-filters')?.addEventListener('click', () => {
        if (searchInput) searchInput.value = '';
        if (typeFilter) typeFilter.value = '';
        if (accountFilter) accountFilter.value = '';
        if (sortSelect) sortSelect.value = 'updated';
        sortRows();
        applyFilters();
    });

    exportButton?.addEventListener('click', () => {
        const headers = ['ID Mitra', 'Nama Mitra', 'Jenis Mitra', 'Contact Person', 'Alamat', 'Status Akun'];
        const escapeCsv = (value) => `"${String(value).replaceAll('"', '""').replace(/\s+/g, ' ').trim()}"`;
        const visibleRows = rows.filter((row) => !row.classList.contains('hidden'));
        const data = visibleRows.map((row) => [
            row.dataset.id,
            row.dataset.name,
            row.dataset.type,
            row.dataset.contact,
            row.dataset.address,
            row.dataset.account,
        ].map(escapeCsv).join(','));
        const csv = [headers.map(escapeCsv).join(','), ...data].join('\r\n');
        const url = URL.createObjectURL(new Blob(['\uFEFF', csv], { type: 'text/csv;charset=utf-8' }));
        const link = document.createElement('a');
        link.href = url;
        link.download = 'direktori-mitra-industri.csv';
        document.body.append(link);
        link.click();
        link.remove();
        URL.revokeObjectURL(url);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            hideModal(partnerModal);
            hideModal(deleteModal);
        }
    });

    if (partnerForm) partnerForm.dataset.createUrl = partnerForm.action;
    sortRows();
    if (window.partnerModalShouldOpen) {
        if (window.partnerFormWasUpdate && window.partnerEditUrl) {
            partnerForm.action = window.partnerEditUrl;
            formMethod.value = 'PUT';
            document.getElementById('partner-modal-title').textContent = 'Ubah Data Mitra';
        }
        showModal(partnerModal);
    }
});
