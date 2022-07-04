<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cropper.js</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@4/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="static/css/cropper.css">
    <style>
        .img-container img {
            max-width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Cropper in a Bootstrap modal</h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-target="#modal" data-toggle="modal">
            Launch the demo
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Cropper</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="img-container">
                            <img id="image" src="images/long-image.jpg" alt="Picture">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/jquery@3/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap@4/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="static/js/cropper.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var image = document.getElementById('image');
            var cropBoxData;
            var canvasData;
            var cropper;

            $('#modal').on('shown.bs.modal', function() {
                cropper = new Cropper(image, {
                    autoCropArea: 0.5,
                    ready: function() {
                        //Should set crop box data first here
                        cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
                    }
                });
            }).on('hidden.bs.modal', function() {
                cropBoxData = cropper.getCropBoxData();
                canvasData = cropper.getCanvasData();
                cropper.destroy();
            });
        });
    </script>
</body>

</html>