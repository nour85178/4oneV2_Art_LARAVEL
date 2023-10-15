@extends('FrontEnd.Styleprod')
@include('FrontEnd.navbarfront')

<section id="register">
    <div class="container">
        <div class="row">
            <div class="register_1 clearfix">
                <div class="col-sm-6 space_left">
                    <div class="register_1l clearfix">
                        <div class="register_1li clearfix">
                            <h3 class="mgt">Create Product</h3>
                        </div>
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="register_1li1 clearfix">
                                <div class="col-sm-6 space_left">
                                    <div class="register_1li1l clearfix">
                                        <h5>Titre</h5>
                                        <input type="text" class="form-control" name="titre" id="titre">
                                    </div>
                                </div>
                                <div class="col-sm-6 space_right">
                                    <div class="register_1li1l clearfix">
                                        <h5>Description</h5>
                                        <input type="text" class="form-control" name="description" id="description">
                                    </div>
                                </div>
                            </div>
                            <div class="register_1li1 clearfix">
                                <div class="col-sm-12 space_all">
                                    <div class="register_1li1l clearfix">
                                        <h5>Prix :</h5>
                                        <input type="number" class="form-control" name="price" id="price">
                                    </div>
                                </div>
                            </div>
                            <div class="register_1li1 clearfix">
                                <div class="col-sm-12 space_all">
                                    <div class="register_1li1l clearfix">
                                        <h5>Image :</h5>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                </div>
                            </div>
                            <div class="register_1li1 clearfix">
                                <div class="col-sm-6 space_left">
                                    <div class="register_1li1l clearfix">
                                        <h5>Categorie :</h5>
                                        <select class="form-control" name="category">
                                            <option value="Peintures">Peintures</option>
                                            <option value="Sculptures">Sculptures</option>
                                            <option value="Photographies">Photographies</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="register_1li1 clearfix">
                                <div class="col-sm-12 space_all">
                                    <div class="register_1li1l clearfix">
                                        <button type="submit" class="button">Ajouter un produit</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@include('FrontEnd.footerfront')

