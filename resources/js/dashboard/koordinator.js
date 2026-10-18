document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('coordinator-modal');
    const classSelect = document.getElementById('assignment-class');
    const lecturerSelect = document.getElementById('assignment-lecturer');
    const currentCoordinator = document.getElementById('current-coordinator');
    const closeButtons = [
        document.getElementById('coordinator-modal-close'),
        document.getElementById('coordinator-modal-cancel'),
    ];
    const searchInput = document.getElementById('coordinator-search');
    const yearFilter = document.getElementById('coordinator-year-filter');
    const semesterFilter = document.getElementById('coordinator-semester-filter');
    const statusFilter = document.getElementById('coordinator-status-filter');
    const programFilter = document.getElementById('coordinator-program-filter');
    const resetFilters = document.getElementById('coordinator-reset-filters');
    const rows = Array.from(document.querySelectorAll('.coordinator-table-row'));
    const historyRows = Array.from(document.querySelectorAll('.coordinator-history-row'));
    const count = document.getElementById('coordinator-visible-count');
    const summaryCount = document.getElementById('coordinator-summary-count');
    const noResults = document.getElementById('coordinator-no-results');
    const exportButton = document.getElementById('btn-export-assignment-history');
    let loadMap = {};

    try {
        loadMap = JSON.parse(modal?.dataset.loadMap ?? '{}');
    } catch (error) {
        console.error('Tidak dapat membaca distribusi beban dosen.', error);
    }

    const updateLecturerOptions = () => {
        if (!classSelect || !lecturerSelect) return;

        const selectedClass = classSelect.selectedOptions[0];
        const term = selectedClass?.dataset.term ?? '';
        const currentNidn = selectedClass?.dataset.currentNidn ?? '';
        const loads = loadMap[term] ?? {};

        if (currentCoordinator) {
            currentCoordinator.textContent = selectedClass?.dataset.currentCoordinator ?? 'Pilih kelas terlebih dahulu';
        }

        Array.from(lecturerSelect.options).forEach((option) => {
            if (!option.value) return;

            if (!option.dataset.originalLabel) {
                option.dataset.originalLabel = option.textContent;
            }

            const workload = Number(loads[option.value] ?? 0);
            const alreadyAssigned = option.value === currentNidn;
            option.textContent = `${option.dataset.originalLabel} (Beban: ${workload}/2 kelas)`;
            option.disabled = alreadyAssigned || workload >= 2;
        });
    };

    const openModal = (classId = '', preserveValues = false) => {
        if (!modal) return;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');

        if (classSelect) {
            classSelect.value = classId;
            if (classId && !classSelect.value) classSelect.value = '';
        }
        if (lecturerSelect && !preserveValues) lecturerSelect.value = '';
        updateLecturerOptions();
        classSelect?.focus();
    };

    const closeModal = () => {
        modal?.classList.add('hidden');
        modal?.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    };

    document.querySelectorAll('[data-open-assignment]').forEach((button) => {
        button.addEventListener('click', () => openModal(button.dataset.classId ?? ''));
    });

    classSelect?.addEventListener('change', () => {
        if (lecturerSelect) lecturerSelect.value = '';
        updateLecturerOptions();
    });

    closeButtons.forEach((button) => button?.addEventListener('click', closeModal));
    modal?.addEventListener('click', (event) => {
        if (event.target === modal) closeModal();
    });

    const applyFilters = () => {
        const query = searchInput?.value.trim().toLocaleLowerCase() ?? '';
        const year = yearFilter?.value ?? '';
        const semester = semesterFilter?.value ?? '';
        const status = statusFilter?.value ?? '';
        const program = programFilter?.value ?? '';
        let visible = 0;

        rows.forEach((row) => {
            const matches = (!query || row.dataset.search?.includes(query))
                && (!year || row.dataset.year === year)
                && (!semester || row.dataset.semester === semester)
                && (!status || row.dataset.status === status)
                && (!program || row.dataset.program === program);

            row.classList.toggle('hidden', !matches);
            if (matches) visible += 1;
        });

        if (count) count.textContent = String(visible);
        if (summaryCount) summaryCount.textContent = String(visible);
        if (noResults) noResults.classList.toggle('hidden', rows.length === 0 || visible > 0);
    };

    [searchInput, yearFilter, semesterFilter, statusFilter, programFilter].forEach((input) => {
        input?.addEventListener(input === searchInput ? 'input' : 'change', applyFilters);
    });

    resetFilters?.addEventListener('click', () => {
        if (searchInput) searchInput.value = '';
        [yearFilter, semesterFilter, statusFilter, programFilter].forEach((filter) => {
            if (filter) filter.value = '';
        });
        historyRows.forEach((row) => row.classList.remove('hidden'));
        applyFilters();
    });

    document.querySelectorAll('[data-history-class]').forEach((link) => {
        link.addEventListener('click', () => {
            const classId = link.dataset.historyClass;
            const matchingHistory = historyRows.filter((row) => row.dataset.historyRowClass === classId);
            historyRows.forEach((row) => row.classList.toggle('hidden', matchingHistory.length > 0 && row.dataset.historyRowClass !== classId));
        });
    });

    exportButton?.addEventListener('click', () => {
        const headers = ['Kelas', 'Nomor SK', 'Koordinator Sebelumnya', 'Koordinator Baru', 'Tanggal SK', 'Alasan', 'Admin'];
        const escapeCsv = (value) => `"${String(value).replaceAll('"', '""').replace(/\s+/g, ' ').trim()}"`;
        const data = historyRows.map((row) => [
            row.dataset.historyRowClass,
            row.dataset.historySk,
            row.dataset.historyPrevious,
            row.dataset.historyCurrent,
            row.dataset.historyDate,
            row.dataset.historyReason,
            row.dataset.historyAdmin,
        ].map(escapeCsv).join(','));
        const csv = [headers.map(escapeCsv).join(','), ...data].join('\r\n');
        const url = URL.createObjectURL(new Blob(['\uFEFF', csv], { type: 'text/csv;charset=utf-8' }));
        const link = document.createElement('a');
        link.href = url;
        link.download = 'riwayat-penetapan-koordinator.csv';
        document.body.append(link);
        link.click();
        link.remove();
        URL.revokeObjectURL(url);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closeModal();
    });

    updateLecturerOptions();
    if (window.coordinatorModalShouldOpen) openModal(document.getElementById('assignment-class')?.value ?? '', true);
});
