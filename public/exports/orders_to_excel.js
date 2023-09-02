this.selectedCheckboxes = [];
this.allSelected = false;

function init() {
    this.$watch('selectedCheckboxes', (value) => {
        this.isExportDisabled = value.length === 0;
    });
}

function toggleSelectAll() {
    if (this.allSelected) {
        this.selectedCheckboxes = [];
    } else {
        const checkboxes = document.querySelectorAll('input[name="orders[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = true;
            this.selectedCheckboxes.push(checkbox.value);
        });
    }
    this.allSelected = !this.allSelected;
}
