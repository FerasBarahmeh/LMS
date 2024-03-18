/**
 * Submit form when change specific inputs
 */
const forms = document.querySelectorAll('[submitWhenChange]');

forms.forEach(form => {
    let ids = form.getAttribute('submitWhenChange').split(/\s*,\s*/);
    ids.forEach(id => {
        let input = document.getElementById(id);
        if (input != null) {
            input.addEventListener('change', () => {
                form.submit();
            });
        }
    });
});
