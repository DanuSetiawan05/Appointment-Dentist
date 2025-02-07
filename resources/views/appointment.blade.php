<section id="appointment" class="appointment section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Make an Appointment</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <form id="appointmentForm" action="{{ route('appointment.store') }}" method="POST" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
            @csrf
            <div class="row">
                <div class="col-md-4 form-group">
                    <input type="text" name="name" class="form-control" id="name" value="d" placeholder="Your Name" required>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" value="d@d" placeholder="Your Email" required>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                    <input type="tel" class="form-control" name="phone" id="phone" value="3" placeholder="Your Phone" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group mt-3">
                    <input type="datetime-local" name="date" class="form-control" id="date" placeholder="Appointment Date" required>
                </div>
                <div class="col-md-4 form-group mt-3">
                    <select name="doctor" id="doctor" class="form-select">
                        <option value="">Select Doctor</option>
                        <option value="Dr. danu">Dr. danu</option>
                        <option value="Dr. mahesa">Dr. mahesa</option>
                        <option value="Dr. kevin">Dr. kevin</option>
                    </select>
                </div>
                <div class="col-md-4 form-group mt-3">
                    <select name="services" id="services" class="form-select">
                        <option value="">Select services</option>
                        <option value="scaling"> Scaling</option>
                        <option value="bleaching"> Bleaching</option>
                        <option value="veener"> Veener</option>
                    </select>
                </div>
            </div>

            <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
            </div>
            <div class="my-3">
                <div class="sent-message" id="successMessage" style="display:none;"></div>
                <div class="error-message" id="errorMessage" style="display:none;"></div>
            </div>
            <div class="text-center"><button type="submit">Make an Appointment</button></div>
        </form>

    </div>
</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {

        $('#appointmentForm').submit(function(event) {
            event.preventDefault();
            var form = $(this);
            var formData = form.serialize();

            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $('p').hide();
                    $('#appointmentForm').children().not('.my-3').hide();
                    $('#successMessage').text('Appointment berhasil dibuat!').slideDown();
                    $('#errorMessage').hide(); 
                    form.trigger('reset'); 
                },
                error: function(xhr, status, error) {
                    $('#errorMessage').text('Error: Gagal mengirim appointment. Mohon coba lagi.').slideDown();
                    $('#successMessage').hide(); 
                    form.trigger('reset'); 
                }
            });
        });

    });
</script>
