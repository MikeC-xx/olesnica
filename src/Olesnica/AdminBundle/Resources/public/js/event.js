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

  var attachments = $('#attachments');
  var addedAttachments = $('#added-attachments');
  var prototype = attachments.data('prototype') + '<hr />';
  $('#add-attachment').click(function() {
    var index = attachments.data('index');
    var item = $(prototype.replace(/__name__/g, index));
    item.find('button[data-action="delete"]').click(function() {
      item.remove();
    });

    attachments.data('index', index + 1);
    addedAttachments.append(item);
  });

  $('button[data-action="delete"]').each(function() {
    $(this).click(function() {
      $(this).parent().parent().remove();
    });
  });

  $('form').on('keyup keypress', function(e) {
    var code = e.keyCode || e.which;
    if (code === 13) {
      e.preventDefault();
      return false;
    }
  });
});
