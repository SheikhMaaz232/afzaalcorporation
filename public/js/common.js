// Restricts input for each element in the set of matched elements to the given inputFilter.
(function($) {
    $.fn.inputFilter = function(inputFilter) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    };
}(jQuery));


// Install input filters.
$("#amount,#debit_amount,#credit_amount,#crv_no,#cpv_no,#jv_no,#brv_no,#bpv_no,#estimated_cost").inputFilter(function(value) {
    return /^-?\d*$/.test(value);
});

//Delete attachment.
function deleteAttachment(id, type) {
    // alert(id+ ' '+ type);
    bootbox.confirm("Do you really want to delete this attachment?", function (result) {
        if (result) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: delete_file_url,
                type: 'DELETE',
                data: {id: id, type: type},
            success: function (response) {
                console.log(response);
                if (response.success) {
                    $("#attachment_" + id).remove();
                    bootbox.alert(response.message);
                } else if (response.error) {
                    bootbox.alert(response.error);
                }
            }
        });
        }
    });
};
/*
$("#uintTextBox").inputFilter(function(value) {
    return /^\d*$/.test(value); });
$("#intLimitTextBox").inputFilter(function(value) {
    return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 500); });
$("#floatTextBox").inputFilter(function(value) {
    return /^-?\d*[.,]?\d*$/.test(value); });
$("#currencyTextBox").inputFilter(function(value) {
    return /^-?\d*[.,]?\d{0,2}$/.test(value); });
$("#latinTextBox").inputFilter(function(value) {
    return /^[a-z]*$/i.test(value); });
$("#hexTextBox").inputFilter(function(value) {
    return /^[0-9a-f]*$/i.test(value); });*/
