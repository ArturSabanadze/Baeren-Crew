
        <div class="hero-form">
            <form id="quick-request-form" action="anfrage" method="POST" enctype="multipart/form-data" class="form">
                <input type="text" name="from_address" placeholder="Auszugsadresse" class="form-input" autocomplete="street-address" required>
                <input type="text" name="to_address" placeholder="Einzugsadresse" class="form-input" autocomplete="address-line3" required>
                <input type="text" name="move_date" placeholder="Umzugsdatum" class="form-input date-input" onfocus="this.type='date'" onblur="if(!this.value)this.type='text'">
                <input type="email" name="email" placeholder="E-Mail" class="form-input" autocomplete="email" required>
                <input type="tel" name="phone" placeholder="Telefonnummer" class="form-input" autocomplete="tel" required>
                <input type="file" name="files[]" class="form-input" multiple>
                <button type="submit" class="btn btn-primary btn-full">
                    Rückruf anfordern
                </button>
            </form>
        </div>