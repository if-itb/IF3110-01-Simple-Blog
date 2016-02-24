<div class="container">
    <div class="row">
        <h2 class="center-align">Create form</h2>
            <form class="col s12" action="/post/create" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="input_text" type="text" length="20" name="judul">
                        <label for="input_text">Title</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="textarea1" class="materialize-textarea" length="1000" name="konten"></textarea>
                        <label for="textarea1">Konten</label>
                    </div>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>

            </form>
    </div>
</div>
