$(document).ready(function () {
    // get plots via ajax
    function fetchPlots(id) {
        // AJAX request
        $.ajax({
            url: `/getplots/${id}`,
            type: 'get',
            success: function (response) {
                // console.log(response);

                let len = 0;
                if (response != null) {
                    len = response.length;
                }
                // console.log(len)

                if (len > 0) {
                    // Read data and create <option >
                    let value = '0';
                    let text = 'Select a Plot';
                    $('#sel_plot').append(new Option(text, value));
                    response.forEach(function (data) {
                        value = data.id;
                        text = data.plot_no;
                        // let option = `<option value="${data.id}">${data.plot_no}</option>`;
                        $('#sel_plot').append(new Option(text, value));
                    })
                } else if (len === 0) {
                    // console.log(len)
                    let value = '0';
                    let text = 'No data found';
                    $('#sel_plot').append(new Option(text, value));
                }

            }
        });
    }

    // Area Change
    $('#sel_area').change(function () {

        // Area id
        let id = $(this).val();

        if (id === "0"  ) {
            $('#sel_plot').find('option').remove();
            const value = '0';
            const text = 'Select an Area From Above';

            // let option = `<option value="${value}">${text}</option>`;
            $('#sel_plot').append(new Option(text, value));
        } else {
            // Empty the dropdown
            // $('#sel_plot').find('option').not(':first').remove();
            $('#sel_plot').find('option').remove();
            fetchPlots(id)
        }

    });
});
