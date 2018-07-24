function load_posting_template(selectedOption) {
    $('#message').val($('#'+selectedOption.value).text());
}
