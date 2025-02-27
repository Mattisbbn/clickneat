
@section("title","Catégorie : ".$category->name)


<h1>Catégorie</h1>

<ul>
    <li>Nom : {{ $category->name }}</li>
    <li>ID : {{ $category->id }}</li>
    <li>Crée le : {{ $category->created_at }}</li>
</ul>

