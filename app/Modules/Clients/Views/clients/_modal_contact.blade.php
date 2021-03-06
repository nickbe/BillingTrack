<script type="text/javascript">
    $(function () {
        const modalContact = $('#modal-contact');

        modalContact.modal();

        $('#btn-contact-submit').click(function () {
            $.post("{{ $submitRoute }}", {
                client_id: {{ $clientId }},
                name: $('#contact_name').val(),
                email: $('#contact_email').val()
            }).fail(function (response) {
                showErrors($.parseJSON(response.responseText).errors, '#modal-status-placeholder');
            }).done(function (response) {
                modalContact.modal('hide');
                $('#tab-contacts').html(response);
            });
        });
    });
</script>

<div class="modal" id="modal-contact">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    @if ($editMode)
                        @lang('fi.edit_contact')
                    @else
                        @lang('fi.add_contact')
                    @endif
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                <div id="modal-status-placeholder"></div>

                <form>

                    <div class="form-group">
                        <label class="col-sm-3 col-form-label">@lang('fi.name'):</label>
                        <div class="col-sm-9">
                            {!! Form::text('contact_name', ($editMode) ? $contact->name : null, ['class' => 'form-control', 'id' => 'contact_name']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-form-label">@lang('fi.email'):</label>
                        <div class="col-sm-9">
                            {!! Form::text('contact_email', ($editMode) ? $contact->email : null, ['class' => 'form-control', 'id' => 'contact_email']) !!}
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('fi.cancel')</button>
                <button type="button" id="btn-contact-submit" class="btn btn-primary">@lang('fi.save')</button>
            </div>
        </div>
    </div>
</div>