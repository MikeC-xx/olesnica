$(document).ready(function() {
  var setStartTime = function() {
    if ($('.set-start-time').prop('checked')) {
      $('#start-time').removeClass('hidden');
    } else {
      $('#start-time').addClass('hidden');
    }
  }
  var setFinishDate = function() {
    if ($('.set-finish-date').prop('checked')) {
      $('#finish-date').removeClass('hidden');
    } else {
      $('#finish-date').addClass('hidden');
    }
  }
  var setFinishTime = function() {
    if ($('.set-finish-time').prop('checked')) {
      $('#finish-time').removeClass('hidden');
    } else {
      $('#finish-time').addClass('hidden');
    }
  }
  $('.set-start-time').change(setStartTime);
  $('.set-finish-date').change(setFinishDate);
  $('.set-finish-time').change(setFinishTime);

  $('.attachment').each(function() {
    var attachment = $(this);
    var btnDelete = attachment.find('.btn-delete');
    var btnCancel = attachment.find('.btn-cancel');
    btnDelete.click(function() {
      attachment.addClass('attachment--deleted');
      btnDelete.addClass('hidden');
      btnCancel.removeClass('hidden');
    });
    btnCancel.click(function() {
      attachment.removeClass('attachment--deleted');
      btnDelete.removeClass('hidden');
      btnCancel.addClass('hidden');
    });
  });

  /*
  $('form').submit(function() {
    var form = $(this);
    var url = form.prop('action');
    var formData = form.serializeArray();
    $.post(url, formData).done(function(data) {
      console.log(data);
    });
    return false;
  });
  */
  $('form').on('keyup keypress', function(e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
      e.preventDefault();
      return false;
    }
  });
});
