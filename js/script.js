const html_code = document.querySelector('.html-code textarea');
const css_code = document.querySelector('.css-code textarea');
const js_code = document.querySelector('.js-code textarea');
const result = document.querySelector('#result');
const code_form = document.querySelector('#code-form');

function run() {
  result.contentDocument.head.innerHTML =
    `<style>${css_code.value}</style>`;
  result.contentDocument.body.innerHTML = html_code.value;

  // result.contentDocument.body.innerHTML = `<style>${css_code.value}</style>` + html_code.value;
  result.contentWindow.eval(js_code.value);
}

html_code.onkeyup = () => run();
css_code.onkeyup = () => run();
js_code.onkeyup = () => run();

code_form.addEventListener('submit', (e) => {
  e.preventDefault();

  const data = formDataToJSON(new FormData(code_form));

  console.log(data);

  showToast('<p>Saving...</p>');
  sentData(data);
});



$('#pname').change((e) => {
  const pname = e.target.value;
  const pid = $('#pid').val();

  console.log({ pname, pid })

  $.post('update_name.php', { pname, pid }, (res, st) => {
    showToast(res)
    console.log(res, st);
  })
})

function sentData(data) {
  $.post('save_project.php', data, (res, st) => {
    showToast(res);
    console.log(res, st);
  });
}

function formDataToJSON(formData) {
  const data = {};
  formData.forEach((value, key) => (data[key] = value));
  return data;
}

function showToast(msg, isError = false) {
  var x = $('#snackbar');

  x.removeClass('show')
  x.html('');

  x.addClass('show');
  x.html(msg);

  setTimeout(function () {
    x.removeClass('show');
  }, 3000);
}
