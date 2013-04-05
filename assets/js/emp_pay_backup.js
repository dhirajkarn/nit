$(document).ready(function() {
                $('.auto').attr('readonly', 'readonly').css('background-color', 'aqua');
                // Validate inputs
                $('#calculate').click(validate);
                function validate() {
                    var dataValid = true;
                    $('.required').each(function() {
                        var cur = $(this);
                        cur.css('background-color', '');
                        if($.trim(cur.val()) == '') {
                            cur.attr('placeholder', 'Manadatory field!');
                            cur.css('background-color', 'yellow');
                            dataValid = false;
                        }
                    });
                    if(!dataValid) return false;
                    $('.number').each(function() {
                        var cur = $(this);
                        cur.css('background-color', '');
                        if(isNaN(cur.val())) {
                            cur.attr('placeholder', 'Must be Number!');
                            cur.css('background-color', 'yellow');
                            dataValid = false;
                        }
                    });
                    if(dataValid) {
                        $('#submit').attr('disabled', false);
                        // Calculate Basic Pay
                        var ppb = parseInt($('#ppb').val());
                        var agp = parseInt($('#agp').val());
                        var basic_pay = ppb + agp;
                        $('#bp').val(parseInt(basic_pay));

                        // Calculate DA of Basic Pay
                        var da_per = parseFloat($('#da_per').val());
                        var da = Math.round(basic_pay * da_per / 100);
                        $('#da').val(parseFloat(da));

                        // Calculate HRA of Basic Pay
                        var hra_per = parseInt($('#hra_per').val());
                        var hra = Math.round(basic_pay * hra_per / 100);
                        $('#hra').val(parseInt(hra));

                        var ta = parseInt($('#ta').val());
                        var spl_allowance = parseInt($('#spl_allowance').val());

                        // Calculate Total Pay
                        var total_pay = basic_pay + da + hra + ta + spl_allowance;
                        $('#total_pay').val(parseInt(total_pay));

                        // Deduction Parts
                        // initializing variables
                        var pf = parseInt($('#pf').val());
                        var gsli_one = parseInt($('#gsli_one').val());
                        var it = parseInt($('#it').val());
                        var hrd = parseInt($('#hrd').val());
                        var rec_pf = parseInt($('#rec_pf').val());
                        var ec = parseInt($('#ec').val());
                        var gsli_two = parseInt($('#gsli_two').val());
                        var p_tax = parseInt($('#p_tax').val());
                        var total_deduction = pf + gsli_one + it + hrd + rec_pf + ec + gsli_two + p_tax;
                        $('#total_deduction').val(parseInt(total_deduction));
                        var net_amount = total_pay - total_deduction;
                        $('#net_amount').val(parseInt(net_amount));
                    } else {
                        return false;
                    }
                }


            });