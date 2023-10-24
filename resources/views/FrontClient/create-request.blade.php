@extends('FrontClient.style')
@include('FrontClient.navbarfront')


<div class="container">
    <div class="row">


        <h1>Create Request</h1>

        <div class="col-md-12">
            <form action="{{ route('requests.store', $artist) }}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="categorie" class="form-label">Categorie</label>
                    <br>
                    <select id="categorie" class="form-select" name='categorie'>
                        <option value="Peintures">Peintures</option>
                        <option value="Sculptures">Sculptures</option>
                        <option value="Photographies">Photographies</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">image de référence</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>


                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>



            </form>
        </div>


    </div>
</div>
@include('FrontClient.footerfront')
