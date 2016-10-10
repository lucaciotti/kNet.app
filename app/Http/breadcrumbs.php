<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', url('/'));
});

// Home > About
Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('About', route('about'));
});

// Home > Client
Breadcrumbs::register('clients', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Clienti', route('client::list'));
});

// Home > Client > [Client]
Breadcrumbs::register('client', function($breadcrumbs, $codClient)
{
    $breadcrumbs->parent('clients');
    $breadcrumbs->push($codClient, route('client::detail', $codClient));
});

// Home > Client > [Client] > [TipoDocs]
Breadcrumbs::register('clientDocs', function($breadcrumbs, $codClient, $tipoDoc)
{
    $breadcrumbs->parent('client', $codClient);
    $docPush = ($tipoDoc == 'O' ? 'Ordini' : ($tipoDoc == 'B' ? 'Bolle' : ($tipoDoc == 'F' ? 'Fatture' : 'Documenti')));
    $breadcrumbs->push($docPush, route('client::detail', $tipoDoc));
});

// Home > Docs
Breadcrumbs::register('docs', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Documenti', route('doc::list'));
});

// Home > Docs > [TipoDocs]
Breadcrumbs::register('docsTipo', function($breadcrumbs, $tipoDoc)
{
    $breadcrumbs->parent('docs');
    $docPush = ($tipoDoc == 'O' ? 'Ordini' : ($tipoDoc == 'B' ? 'Bolle' : ($tipoDoc == 'F' ? 'Fatture' : $tipoDoc)));
    $breadcrumbs->push($docPush, route('doc::list', $tipoDoc));
});

// Home > Docs > [TipoDocs] > Detail
Breadcrumbs::register('docsDetail', function($breadcrumbs, $head)
{
    $breadcrumbs->parent('docsTipo', $head->tipomodulo);
    $docPush = $head->tipodoc." ".$head->numerodoc;
    $breadcrumbs->push($docPush, route('doc::detail', $head->id));
});

// Home > Scads
Breadcrumbs::register('scads', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Scadenze', route('scad::list'));
});

// Home > Prods
Breadcrumbs::register('prods', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Prodotti', route('prod::list'));
});

// Home > [Client] > StatCli
Breadcrumbs::register('clientStFat', function($breadcrumbs, $codClient)
{
    $breadcrumbs->parent('client', $codClient);
    $breadcrumbs->push("St.Fatt.", route('stFatt::idxCli', $codClient));
});

// Home > StatAgent
Breadcrumbs::register('agentStFat', function($breadcrumbs, $codAg)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push("St.Fatt. Agente", route('stFatt::idxCli', $codAg));
});

// Home > [Client] > ShowVisite
Breadcrumbs::register('visitShwCli', function($breadcrumbs, $codClient)
{
    $breadcrumbs->parent('client', $codClient);
    $breadcrumbs->push("Visite", route('visit::show', $codClient));
});

// Home > [Client] > InsVisite
Breadcrumbs::register('visitInsCli', function($breadcrumbs, $codClient)
{
    $breadcrumbs->parent('client', $codClient);
    $breadcrumbs->push("Ins. Visita", route('visit::insert', $codClient));
});

// Home > InsVisite
Breadcrumbs::register('visitIns', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push("Ins. Visita", route('visit::insert'));
});
