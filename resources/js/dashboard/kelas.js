/* =============================================================
   resources/js/dashboard/kelas.js
   Script & Tailwind Configuration khusus Kelola Data Kelas Capstone
   ============================================================= */

tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: '#f37021',
                'primary-hover': '#e05d0e',
                'primary-container': '#fff3ec',
                secondary: '#4f6073',
                'secondary-container': '#f1f5f9',
                error: '#dc2626',
                'error-container': '#fef2f2',
                surface: '#ffffff',
                background: '#f8fafc',
                'on-surface': '#1e293b',
                'on-surface-variant': '#64748b',
                'outline-variant': '#e2e8f0'
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
                display: ['Plus Jakarta Sans', 'sans-serif']
            }
        }
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const tambahKelasModal = document.getElementById('tambahKelasModal');
    const btnOpenModal = document.getElementById('btn-open-modal');
    const btnCloseModal = document.getElementById('btn-close-modal');
    const btnCancelModal = document.getElementById('btn-cancel-modal');
    const exportButton = document.getElementById('btn-export-classes');
    const searchInput = document.getElementById('kelas-search');
    const yearFilter = document.getElementById('kelas-year-filter');
    const semesterFilter = document.getElementById('kelas-semester-filter');
    const coordinatorFilter = document.getElementById('kelas-coordinator-filter');
    const resetFilters = document.getElementById('kelas-reset-filters');
    const visibleCount = document.getElementById('kelas-visible-count');
    const summaryCount = document.getElementById('kelas-summary-count');
    const noResults = document.getElementById('kelas-no-results');
    const rows = Array.from(document.querySelectorAll('.kelas-table-row'));
    const quotaInput = document.getElementById('team-quota');
    const studentCapacity = document.getElementById('student-capacity');

    const openModal = () => {
        if (!tambahKelasModal) return;
        tambahKelasModal.classList.remove('hidden');
        tambahKelasModal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    };

    const closeModal = () => {
        if (!tambahKelasModal) return;
        tambahKelasModal.classList.add('hidden');
        tambahKelasModal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    };

    if (btnOpenModal) {
        btnOpenModal.addEventListener('click', openModal);
    }

    if (btnCloseModal) {
        btnCloseModal.addEventListener('click', closeModal);
    }

    if (btnCancelModal) {
        btnCancelModal.addEventListener('click', closeModal);
    }

    if (tambahKelasModal) {
        tambahKelasModal.addEventListener('click', (event) => {
            if (event.target === tambahKelasModal) {
                closeModal();
            }
        });
    }

    const filterRows = () => {
        const query = searchInput?.value.trim().toLocaleLowerCase() ?? '';
        const year = yearFilter?.value ?? '';
        const semester = semesterFilter?.value ?? '';
        const coordinator = coordinatorFilter?.value ?? '';
        let visibleRows = 0;

        rows.forEach((row) => {
            const matches = (!query || row.dataset.search?.includes(query))
                && (!year || row.dataset.year === year)
                && (!semester || row.dataset.semester === semester)
                && (!coordinator || row.dataset.coordinator === coordinator);

            row.classList.toggle('hidden', !matches);
            if (matches) visibleRows += 1;
        });

        if (visibleCount) visibleCount.textContent = String(visibleRows);
        if (summaryCount) summaryCount.textContent = String(visibleRows);
        if (noResults) noResults.classList.toggle('hidden', rows.length === 0 || visibleRows > 0);
    };

    [searchInput, yearFilter, semesterFilter, coordinatorFilter].forEach((input) => {
        input?.addEventListener(input === searchInput ? 'input' : 'change', filterRows);
    });

    resetFilters?.addEventListener('click', () => {
        if (searchInput) searchInput.value = '';
        if (yearFilter) yearFilter.value = '';
        if (semesterFilter) semesterFilter.value = '';
        if (coordinatorFilter) coordinatorFilter.value = '';
        filterRows();
    });

    quotaInput?.addEventListener('input', () => {
        const quota = Number.parseInt(quotaInput.value, 10);
        if (studentCapacity) {
            studentCapacity.textContent = Number.isFinite(quota) && quota > 0
                ? `${quota * 3}–${quota * 4} Mahasiswa`
                : '— Mahasiswa';
        }
    });

    exportButton?.addEventListener('click', () => {
        const headers = ['Kode & Mata Kuliah', 'Tahun Akademik', 'Semester', 'Dosen Koordinator', 'Kuota Tim', 'Kapasitas Estimasi', 'Penugasan'];
        const escapeCsv = (value) => `"${String(value).replaceAll('"', '""').replace(/\s+/g, ' ').trim()}"`;
        const visibleRows = rows.filter((row) => !row.classList.contains('hidden'));
        const data = visibleRows.map((row) => Array.from(row.cells, (cell) => escapeCsv(cell.innerText)));
        const csv = [headers.map(escapeCsv).join(','), ...data.map((row) => row.join(','))].join('\r\n');
        const url = URL.createObjectURL(new Blob(['\uFEFF', csv], { type: 'text/csv;charset=utf-8' }));
        const download = document.createElement('a');
        download.href = url;
        download.download = 'rekap-kelas-capstone.csv';
        document.body.append(download);
        download.click();
        download.remove();
        URL.revokeObjectURL(url);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closeModal();
    });
});
