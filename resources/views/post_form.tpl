<div class="container">
    <div class="row">
        <h2 class="center-align">[@form_title]</h2>
            <form class="col s12" action="[@form_url]" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="input_text" type="text" length="20" name="judul" value="[@title_value]">
                        <label for="input_text">Title</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="textarea1" class="materialize-textarea" length="1000" name="konten">[@content_value]</textarea>
                        <label for="textarea1">Konten</label>
                    </div>
                </div>

                <div class="file-field input-field">
                    <div class="btn">
                        <span>Image (png)</span>
                        <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one png file">
                    </div>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>

            </form>
    </div>
</div>
