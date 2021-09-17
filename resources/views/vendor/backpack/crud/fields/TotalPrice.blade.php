<!-- total input -->
@include('crud::fields.inc.wrapper_start')
    <label>{!! $field['label'] !!}</label>
    @include('crud::fields.inc.translatable_icon')

    @if(isset($field['prefix']) || isset($field['suffix'])) <div class="input-group"> @endif
        @if(isset($field['prefix'])) <div class="input-group-prepend"><span class="input-group-text">{!! $field['prefix'] !!}</span></div> @endif
        <input
        	type="text"
        	name="{{ $field['name'] }}"
            data-init-function="bpFieldInitTotalPrice"
            value="{{ old(square_brackets_to_dots($field['name'])) ?? $field['value'] ?? $field['default'] ?? '' }}"
            @include('crud::fields.inc.attributes')
        	>
        @if(isset($field['suffix'])) <div class="input-group-append"><span class="input-group-text">{!! $field['suffix'] !!}</span></div> @endif

    @if(isset($field['prefix']) || isset($field['suffix'])) </div> @endif

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')

{{-- ########################################## --}}
{{-- Extra CSS and JS for this particular field --}}
{{-- If a field type is shown multiple times on a form, the CSS and JS will only be loaded once --}}
@if ($crud->fieldTypeNotLoaded($field))
    @php
        $crud->markFieldTypeAsLoaded($field);
    @endphp

    {{-- FIELD JS - will be loaded in the after_scripts section --}}
    @push('crud_fields_scripts')
        <script>
                $(document).ready(function () {       
                    $('#room_select2').change(function() {
                        let priceInput = $("input[name=total_price]");

                        let checkIn = new Date($('input[name=check_in]').val());
                        let checkOut = new Date($('input[name=check_out]').val());

                        let diffInTime = checkOut.getTime() - checkIn.getTime();
                        let diffInDays = Math.ceil(diffInTime / (1000 * 3600 * 24));

                        let roomTypeInput = $("#roomtype_select2").find(":selected")[0].text;
                        let roomTypePrice = roomTypeInput.match(/\d+/)[0];

                        let roomAmount = $('#room_select2').find(":selected").length;

                        let roomsTotalPrice = roomTypePrice * roomAmount;
                        let totalPrice = roomsTotalPrice * diffInDays;

                        $(priceInput).val(totalPrice);

                        $(document).on("dp.change", function () {
                            $('.select2-selection__choice').empty();
                            $("input[name=total_price]").val(null);
                        })
                    })
                    
            });
           
        </script>
    @endpush

@endif
{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}
