
<form class="col s12" action="[@form_url]" method="post">
    <div class="row">
        <div class="card blue-grey ">
            <div class="card-content white-text">
                <div class="input-field col s6">
                    <input type="text" length="20" name="name" >
                    <label class="white-text" for="input_text">Nama</label>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input type="email" length="50" name="email">
                        <label class="white-text" for="textarea1">Email</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <textarea class="materialize-textarea" length="1000" name="konten"></textarea>
                        <label class="white-text" for="textarea1">Komentar</label>
                    </div>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </div>
</form>

