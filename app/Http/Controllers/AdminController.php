<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\Sindicato;
use App\Associado\Associado;
use App\Parceiro\Parceiro;
use App\Promocao;
use App\Cupom;
use App\Estabelecimento;
use App\SinSubcategoria;
use App\RelSinSubcategoria;
use App\RelParSubcategoria;
use App\RelProSubcategoria;
use App\ParSubcategorias;
use App\SinCategoria;
use App\ParCategoria;
use App\ProCategoria;
use Illuminate\Support\Facades\DB;
use URL;

class AdminController extends Controller
{
    function admin_login() {
        return view('adm.login');
    }

    function admin_login_action(Request $request) {

        $email = $request->email;
        $password = $request->password;

        $admin = Admin::where('ADM_EMAIL', $email)->where('ADM_ATIVADO', 'S')->first();

        if(isset($admin)) {

            if (Hash::check($password, $admin->ADM_SENHA)) {
                // Login
                session(['admin' => $email, 'password'=>$password]);


                return redirect()->route('admin_dashboard');
            }
        }

        return redirect()->route('admin_login')->with('erro', 'Erro: Login e/ou Senha inválidos');
    }

    function admin_logout() {
        session()->flush();
        return redirect()->route('admin_login');
    }

    function dashboard() {
        return view('adm.dashboard');
    }

    function administradores() {
        $admins = Admin::all();

        return view('adm.administradores', ['admins' => $admins]);
    }

    function administrador($id) {
        if($id == 0) {
            // Create
            $admin = new Admin();
        } else {
            // Update
            $admin = Admin::find($id);
        }

        return view('adm.administrador', ['admin' => $admin]);
    }

    public function updateOrCreate(Request $request) {

        $admin = Admin::find($request->id);
        if($admin) {
            //update
            $admin->ADM_EMAIL = $request->email;
            $admin->ADM_SENHA = bcrypt($request->password);
            $admin->save();
            return redirect()->route('admin_adm_list')->with('sucesso', 'Administrador alterado com sucesso');

        } else {
            //create
            $newAdmin = new Admin();
            $newAdmin->ADM_EMAIL = $request->email;
            $newAdmin->ADM_SENHA = bcrypt($request->password);
            $newAdmin->save();

            return redirect()->route('admin_adm_list')->with('sucesso', 'Administrador criado com sucesso');
        }
    }

    function activeOrDeactive($id) {

        $admin = Admin::find($id);

        $txt = "";
        if($admin->ADM_ATIVADO == 'N') {
            $admin->ADM_ATIVADO = 'S';
            $txt = "Administrador Ativado com sucesso";
        } else {
            $admin->ADM_ATIVADO = 'N';
            $txt = "Administrador Desativado com sucesso";
        }
        $admin->save();

        return redirect()->route('admin_adm_list')->with('sucesso', $txt);

    }

    function sindicatos() {
        $sindicatos = Sindicato::all();

        return view('adm.sindicatos', ['sindicatos' => $sindicatos]);
    }
    
    function sindicato($id) {
        if($id == 0) {
            // Create
            $rel = '';
            $sindicato = new Sindicato();
        } else {
            // Update
            $sindicato = Sindicato::find($id);
            $rel = $sindicato->getCategoria();
        }
        return view('adm.sindicato', ['sindicato' => $sindicato, 'rel' => $rel]);
    }

    function sinUpdateOrCreate(Request $request) 
    {
        $sindicato = Sindicato::find($request->id);
        $sindicato_id = 0;
        if($sindicato) {
            //update
            $sindicato->SIN_FANTASIA = $request->fantasia;
            $sindicato->SIN_RAZAO_SOCIAL = $request->razao;
            $sindicato->SIN_CNPJ = $request->CNPJ;
            $sindicato->SIN_ATIVIDADE= $request->atividade;
            $sindicato->SIN_EMAIL = $request->email;
            $sindicato->SIN_RESPONSAVEL_NOME = $request->responsavel;
            $sindicato->SIN_RESPONSAVEL_CPF = $request->responsavel_CPF;
            $sindicato->SIN_RESPONSAVEL_EMAIL = $request->responsavel_email;
            $sindicato->SIN_SITE = $request->site;
            $sindicato->SIN_FACEBOOK = $request->facebook;
            $sindicato->SIN_INSTAGRAM = $request->instagram;
            $sindicato->SIN_YOUTUBE = $request->youtube;

            if($request->file('logo')) {
                $sindicato->SIN_LOGO = "storage".substr($request->file('logo')->store('public/sindicato_logo'), 6);
            }

            $sindicato->save();
            // Atualiza categoria;
            DB::table('rel_sin_subcategorias')->where('SIN_ID', $request->id)->update(['SCA_ID' => $request->categorias]);

            // Apaga todos os existentes
            // $subcategoriaExist = RelSinSubcategoria::getRelSinSubcatSindicato($sindicato->SIN_ID);
            // foreach ($subcategoriaExist as $subExist){ 
            //     $subExist->delete();   
            // }
            // // Inclui os novos
            // $subcategorias = $request->subcategorias;
            // foreach ($subcategorias as $subcategoria_id){ 
            //     $sub = SinSubcategoria::find($subcategoria_id);
            //     $newRelSinSubcategoria = new RelSinSubcategoria();
            //     $newRelSinSubcategoria->SSC_ID = $sub->SSC_ID;
            //     $newRelSinSubcategoria->SCA_ID = $sub->SCA_ID;
            //     $newRelSinSubcategoria->SIN_ID = $sindicato->SIN_ID;
            //     $newRelSinSubcategoria->save();    
            // }

            return redirect()->route('admin_sin_list')->with('sucesso', 'Sindicato alterado com sucesso');

        } else {
            //create
            $newsindicato = new Sindicato();
            $newsindicato->SIN_FANTASIA = $request->fantasia;
            $newsindicato->SIN_RAZAO_SOCIAL = $request->razao;
            $newsindicato->SIN_CNPJ = $request->CNPJ;
            $newsindicato->SIN_ATIVIDADE= $request->atividade;
            $newsindicato->SIN_EMAIL = $request->email;
            $newsindicato->SIN_RESPONSAVEL_NOME = $request->responsavel;
            $newsindicato->SIN_RESPONSAVEL_CPF = $request->responsavel_CPF;
            $newsindicato->SIN_RESPONSAVEL_EMAIL = $request->responsavel_email;
            $newsindicato->SIN_SITE = $request->site;
            $newsindicato->SIN_FACEBOOK = $request->facebook;
            $newsindicato->SIN_INSTAGRAM = $request->instagram;
            $newsindicato->SIN_YOUTUBE = $request->youtube;

            if($request->file('logo')) {
                $newsindicato->SIN_LOGO = "storage".substr($request->file('logo')->store('public/sindicato_logo'), 6);
            }

            $newsindicato->SIN_SENHA = bcrypt($newsindicato->SIN_CNPJ);
            $newsindicato->SIN_APROVADO = 'S';
            $newsindicato->save();

            // Inclui os novos
            // $subcategorias = $request->categorias;
            // foreach ($subcategorias as $subcategoria_id){ 
            //     $sub = SinSubcategoria::find($subcategoria_id);
            //     $newRelSinSubcategoria = new RelSinSubcategoria();
            //     $newRelSinSubcategoria->SSC_ID = $sub->SSC_ID;
            //     $newRelSinSubcategoria->SCA_ID = $sub->SCA_ID;
            //     $newRelSinSubcategoria->SIN_ID = $newsindicato->SIN_ID;
            //     $newRelSinSubcategoria->save();    
            // }

            $newRelSinSubcategoria = new RelSinSubcategoria();
            $newRelSinSubcategoria->SSC_ID = 0;
            $newRelSinSubcategoria->SCA_ID = $request->categorias;
            $newRelSinSubcategoria->SIN_ID = $newsindicato->SIN_ID;
            $newRelSinSubcategoria->save();    

            return redirect()->route('admin_sin_list')->with('sucesso', 'Sindicato criado com sucesso');
        }
    }
    
    function sinCatUpdateOrCreate(Request $request) 
    {
        // dd($request);
        $sinCategoria = SinCategoria::find($request->id);
        $sinCategoria_id = 0;
        if($sinCategoria) {
            //update
            $sinCategoria->SCA_NOME = $request->nome;
            $sinCategoria->SCA_PARENTE = $request->parente;
            $sinCategoria->save();
                        
            // Inclui os novos subcategorias
            // $subcategorias = $request->subcategorias;
            // foreach ($subcategorias as $subcategoria_id){ 
            //     $sub = SinSubcategoria::find($subcategoria_id);
            //     $newRelSinSubcategoria = new SinSubcategoria();
            //     $newRelSinSubcategoria->SSC_NOME = $subcategoria_id;
            //     $newRelSinSubcategoria->save();    
            // }

            return redirect()->route('admin_sin_cat_list')->with('sucesso', 'Categoria sindicato alterado com sucesso');

        } else {
            //create
            $newsinCategoria = new SinCategoria();
            $newsinCategoria->SCA_NOME = $request->nome;
            $newsinCategoria->SCA_PARENTE = $request->parente;
            $newsinCategoria->save();

            // Inclui os novos
            // $subcategorias = $request->subcategorias;
            // foreach ($subcategorias as $subcategoria_id) { 
            //     $newSinSubcategoria = new SinSubcategoria();
            //     $newSinSubcategoria->SSC_NOME = $subcategoria_id;
            //     $newSinSubcategoria->SCA_ID = $newsinCategoria->SCA_ID;
            //     $newSinSubcategoria->save();    
            // }

            return redirect()->route('admin_sin_cat_list')->with('sucesso', 'Categoria sindicato criado com sucesso');
        }
        
    }

    public function sinCatDelete($id)
    {
        $sinCategoria = SinCategoria::find($id);
        $sinCategoria->delete();

        return redirect()->route('admin_sin_cat_list')->with('sucesso', 'Deletado com sucesso');
    }

    function sinActiveOrDeactive($id) {
        $sindicato = Sindicato::find($id);

        $txt = "";
        if($sindicato->SIN_ATIVADO == 'N') {
            $sindicato->SIN_ATIVADO = 'S';
            $txt = "Sindicato Ativado com sucesso";
        } else {
            $sindicato->SIN_ATIVADO = 'N';
            $txt = "Sindicato Desativado com sucesso";
        }
        $sindicato->save();

        return redirect()->route('admin_sin_list')->with('sucesso', $txt);
    }

    function sinAprovarDesaprovar($id) {
        $sindicato = Sindicato::find($id);

        $txt = "";
        if($sindicato->SIN_APROVADO == 'N') {
            $sindicato->SIN_APROVADO = 'S';
            $txt = "Sindicato aprovado com sucesso";
        } else {
            $sindicato->SIN_APROVADO = 'N';
            $txt = "Sindicato desaprovado com sucesso";
        }
        $sindicato->save();

        return redirect()->route('admin_sin_list')->with('sucesso', $txt);
    }

    function sinCategorias() {
        // $categorias = Sindicato::getCategorias();
        $categorias = $this->categoriaSubcategoria();
        
        return view('adm.categoriasSindicato', ['categorias' => $categorias]);
    }    

    public function categoriaSubcategoria($id=0,$conta=1,$pertence=0)
    {
        $sql1 = DB::table('sin_categorias')->where('SCA_PARENTE',$id)->get();
        // $sql1 = DB::table('sin_categorias')->get();

        $espaco = str_repeat(" &nbsp; ", $conta);
        $options = null;

        foreach($sql1 as $i) 
        {
            $sql2 = DB::table('sin_categorias')->where('SCA_PARENTE',$i->SCA_ID)->get();

            if(count($sql2) > 0)
            {
                $bt_delete =  '<a title="Não pode ser deletado" class="btn btn-danger disabled">Deletar</a> ';
            }else{
                $bt_delete = '<a href="'.URL::route('admin_sin_cat_delete', $i->SCA_ID).'" class="btn btn-danger">Deletar</a>';
            }

            $bt_edita = '<a href="'.$i->SCA_ID.'" class="btn btn-primary">Alterar</a>';

            $id_busca = $i->SCA_ID;

            $options .= '<tr>';

            if($i->SCA_PARENTE == $pertence)
            {
                $options .= '
                        <td><strong>'.$i->SCA_NOME.'</strong></td>
                        <td>'.$bt_delete.' '.$bt_edita.'</td>';
            }else{ 
                $conta++;
                $id_anterior = $id;
                $options .= '
                        <td>'.$espaco.' <span class="md-color-light-blue-600">'.$i->SCA_NOME.'</span></td>
                        <td>'.$bt_delete.' '.$bt_edita.'</td>';
            }
            $options .= '</tr>';
            $options .= $this->categoriaSubcategoria($id_busca,$conta);
        }
        return $options;
    }

    function sinCategoria($id) 
    {
        if($id == 0) {
            // Create
            $categoria = new SinCategoria();
            $categorias = Sindicato::getCategorias();
        } else {
            // Update
            $categoria = SinCategoria::find($id);
            $categorias = Sindicato::getCategorias();
        }
        return view('adm.categoriaSindicato', compact('categoria','categorias'));
    }  

    function sinEstabelecimentos() {
        $estabelecimentos = Estabelecimento::whereNotNull('SIN_ID')->get();

        return view('adm.estabelecimentosSindicato', [
            'estabelecimentos' => $estabelecimentos
            ]);
    }

    function sinEstabelecimento($id) {

        if($id == 0) {
            // Create
            $estabelecimento = new Estabelecimento();
        } else {
            // Update
            $estabelecimento = Estabelecimento::find($id);
        }

        $sindicatos = Sindicato::all();

        return view('adm.estabelecimentoSindicato', 
            [
                'estabelecimento' => $estabelecimento,
                'sindicatos' => $sindicatos
            ]);
    }

    function sinEstUpdateOrCreate(Request $request) 
    {
        $sindicato_id = $request->sindicato_id;

        $estabelecimento = Estabelecimento::find($request->id);

        // dd($sindicato_id);
        if($estabelecimento) {
            //update
            $estabelecimento->EST_NOME = $request->nome;
            $estabelecimento->EST_CEP = $request->cep;
            $estabelecimento->EST_UF = $request->uf;
            $estabelecimento->EST_CIDADE= $request->cidade;
            $estabelecimento->EST_BAIRRO = $request->bairro;
            $estabelecimento->EST_RUA = $request->rua;
            $estabelecimento->EST_NUMERO = $request->numero;
            $estabelecimento->EST_COMPLEMENTO = $request->complemento;
            $estabelecimento->EST_LAT = $request->latitude;
            $estabelecimento->EST_LNG = $request->logitude;
            $estabelecimento->EST_TELEFONE = $request->telefone;
            $estabelecimento->EST_TELEFONE_ALT = $request->telefone_alt;

            $estabelecimento->save();

            return redirect()->route('admin_sin_est_list')->with('sucesso','Estabelecimento alterado com sucesso');
   
        } else {
            //create
            $newestabelecimento = new Estabelecimento();
            $newestabelecimento->SIN_ID = $sindicato_id;
            $newestabelecimento->EST_NOME = $request->nome;
            $newestabelecimento->EST_CEP = $request->cep;
            $newestabelecimento->EST_UF = $request->uf;
            $newestabelecimento->EST_CIDADE= $request->cidade;
            $newestabelecimento->EST_BAIRRO = $request->bairro;
            $newestabelecimento->EST_RUA = $request->rua;
            $newestabelecimento->EST_NUMERO = $request->numero;
            $newestabelecimento->EST_COMPLEMENTO = $request->complemento;
            $newestabelecimento->EST_LAT = $request->latitude;
            $newestabelecimento->EST_LNG = $request->logitude;
            $newestabelecimento->EST_TELEFONE = $request->telefone;
            $newestabelecimento->EST_TELEFONE_ALT = $request->telefone_alt;
            $newestabelecimento->save();

            return redirect()->route('admin_sin_est_list')->with('sucesso', 'Estabelecimento criado com sucesso');
        }
    }

    function associados() {
        $associados = Associado::paginate(15);

        return view('adm.associados', ['associados' => $associados]);
    }

    function associado($id) {
        if($id == 0) {
            // Create
            $associado = new Associado();
        } else {
            // Update
            $associado = Associado::find($id);
        }

        $sindicatos = Sindicato::where('SIN_ATIVADO', 'S')->get();
        return view('adm.associado', ['associado' => $associado, 'sindicatos' => $sindicatos]);
    }

    function assUpdateOrCreate(Request $request) {

        $associado = associado::find($request->id);
        if($associado) {
            //update
            $associado->SIN_ID = $request->sindicato;
            $associado->ASS_NOME = $request->nome;
            $associado->ASS_EMAIL = $request->email;
            $associado->ASS_NASCIMENTO= $request->nascimento;
            $associado->ASS_GENERO = $request->genero;
            $associado->ASS_EMPRESA = $request->empresa;
            $associado->ASS_FUNCAO = $request->funcao;
            $associado->ASS_CPF = $request->CPF;
            $associado->ASS_CEP = $request->CEP;
            $associado->ASS_UF = $request->UF;
            $associado->ASS_CIDADE = $request->cidade;
            $associado->ASS_BAIRRO = $request->bairro;
            $associado->ASS_RUA = $request->rua;
            $associado->ASS_NUMERO = $request->numero;
            $associado->ASS_COMPLEMENTO = $request->complemento;
            if ($request->senha) {
                $associado->ASS_SENHA = bcrypt($request->senha);
            }

            $associado->save();
            return redirect()->route('admin_ass_list')->with('sucesso', 'Associado alterado com sucesso');

        } else {
            //create
            $newAssociado = new Associado();
            $newAssociado->SIN_ID = $request->sindicato;
            $newAssociado->ASS_NOME = $request->nome;
            $newAssociado->ASS_SOBRENOME = $request->sobrenome;
            $newAssociado->ASS_EMAIL = $request->email;
            $newAssociado->ASS_NASCIMENTO= $request->nascimento;
            $newAssociado->ASS_GENERO = $request->genero;
            $newAssociado->ASS_EMPRESA = $request->empresa;
            $newAssociado->ASS_FUNCAO = $request->funcao;
            $newAssociado->ASS_CPF = $request->CPF;
            $newAssociado->ASS_CEP = $request->CEP;
            $newAssociado->ASS_UF = $request->UF;
            $newAssociado->ASS_CIDADE = $request->cidade;
            $newAssociado->ASS_BAIRRO = $request->bairro;
            $newAssociado->ASS_RUA = $request->rua;
            $newAssociado->ASS_NUMERO = $request->numero;
            $newAssociado->ASS_COMPLEMENTO = $request->complemento;

            $newAssociado->ASS_SENHA = bcrypt($newAssociado->senha);

            $newAssociado->ASS_ATIVADO = 'S';

            $newAssociado->save();

            return redirect()->route('admin_ass_list')->with('sucesso', 'Associado criado com sucesso');
        }
    }

    function assAprovarDesaprovar($id) {
        $associado = Associado::find($id);

        $txt = "";
        if($associado->ASS_APROVADO == 'N') {
            $associado->ASS_APROVADO = 'S';
            $txt = "Associado aprovado com sucesso";
        } else {
            $associado->ASS_APROVADO = 'N';
            $txt = "Associado desaprovado com sucesso";
        }
        $associado->save();

        return redirect()->route('admin_ass_list')->with('sucesso', $txt);
    }

    function assActiveOrDeactive($id) {
        $associado = Associado::find($id);

        $txt = "";
        if($associado->ASS_ATIVADO == 'N') {
            $associado->ASS_ATIVADO = 'S';
            $txt = "Associado Ativado com sucesso";
        } else {
            $associado->ASS_ATIVADO = 'N';
            $txt = "Associado Desativado com sucesso";
        }
        $associado->save();

        return redirect()->route('admin_ass_list')->with('sucesso', $txt);
    }


    function parceiros() {
        $parceiros = Parceiro::all();

        return view('adm.parceiros', ['parceiros' => $parceiros]);
    }

    function parceiro($id) {
        if($id == 0) {
            // Create
            $parceiro = new Parceiro();
        } else {
            // Update
            $parceiro = Parceiro::find($id);
        }

        return view('adm.parceiro', ['parceiro' => $parceiro]);
    }

    function parUpdateOrCreate(Request $request) 
    {
        // dd($request);

        $parceiro = Parceiro::find($request->id);
        if($parceiro) {
            //update
            $parceiro->PAR_FANTASIA = $request->fantasia;
            $parceiro->PAR_RAZAO_SOCIAL = $request->razao;
            $parceiro->PAR_CNPJ = $request->CNPJ;
            $parceiro->PAR_ATIVIDADE= $request->atividade;
            $parceiro->PAR_EMAIL = $request->email;
            $parceiro->PAR_RESPONSAVEL_NOME = $request->responsavel;
            $parceiro->PAR_RESPONSAVEL_CPF = $request->responsavel_CPF;
            $parceiro->PAR_RESPONSAVEL_EMAIL = $request->responsavel_email;
            $parceiro->PAR_SITE = $request->site;
            $parceiro->PAR_FACEBOOK = $request->facebook;
            $parceiro->PAR_INSTAGRAM = $request->instagram;
            $parceiro->PAR_YOUTUBE = $request->youtube;

            if($request->file('logo')) {
                $parceiro->PAR_LOGO = "storage".substr($request->file('logo')->store('public/sindicato_logo'), 6);
            }
            $parceiro->save();
            $txt = 'Parceiro alterado com sucesso';

            // Apaga todos os existentes
            $subcategoriaExist = RelParSubcategoria::getRelProSubcatParceiro($parceiro->PAR_ID);
            foreach ($subcategoriaExist as $subExist) { 
                $subExist->delete();   
            }
            // Inclui os novos
            if ($request->subcategorias) {
                $subcategorias = $request->subcategorias;
                foreach ($subcategorias as $subcategoria_id){ 
                    $sub = ParSubcategorias::find($subcategoria_id);
                    $newRelParSubcategoria = new RelParSubcategoria();
                    $newRelParSubcategoria->SPA_ID = $sub->SPA_ID;
                    $newRelParSubcategoria->PAC_ID = $sub->PAC_ID;
                    $newRelParSubcategoria->PAR_ID = $parceiro->PAR_ID;
                    $newRelParSubcategoria->save();    
                }
            }

        } else {
            //create
            $newParceiro = new Parceiro();
            $newParceiro->PAR_FANTASIA = $request->fantasia;
            $newParceiro->PAR_RAZAO_SOCIAL = $request->razao;
            $newParceiro->PAR_CNPJ = $request->CNPJ;
            $newParceiro->PAR_ATIVIDADE= $request->atividade;
            $newParceiro->PAR_EMAIL = $request->email;
            $newParceiro->PAR_RESPONSAVEL_NOME = $request->responsavel;
            $newParceiro->PAR_RESPONSAVEL_CPF = $request->responsavel_CPF;
            $newParceiro->PAR_RESPONSAVEL_EMAIL = $request->responsavel_email;
            $newParceiro->PAR_SITE = $request->site;
            $newParceiro->PAR_FACEBOOK = $request->facebook;
            $newParceiro->PAR_INSTAGRAM = $request->instagram;
            $newParceiro->PAR_YOUTUBE = $request->youtube;

            if($request->file('logo')) {
                $newParceiro->PAR_LOGO = "storage".substr($request->file('logo')->store('public/sindicato_logo'), 6);
            }

            $newParceiro->PAR_SENHA = bcrypt($newParceiro->PAR_RESPONSAVEL_CPF);
            $newParceiro->PAR_APROVADO = 'S';
            $newParceiro->save();
            $txt = 'Parceiro criado com sucesso';

            // Inclui os novos
            if ($request->subcategorias) {
                $subcategorias = $request->subcategorias;
                foreach ($subcategorias as $subcategoria_id){ 
                    $sub = ParSubcategoria::find($subcategoria_id);
                    $newRelParSubcategoria = new RelParSubcategoria();
                    $newRelParSubcategoria->SPA_ID = $sub->SPA_ID;
                    $newRelParSubcategoria->PAC_ID = $sub->PAC_ID;
                    $newRelParSubcategoria->PAR_ID = $parceiro->PAR_ID;
                    $newRelParSubcategoria->save();    
                }
            }

        }
        return redirect()->route('admin_par_list')->with('sucesso', $txt);

    }

    function parCatUpdateOrCreate(Request $request) 
    {
        // dd($request);
        $parCategoria = ParCategoria::find($request->id);
        $parCategoria_id = 0;
        if($parCategoria) {
            //update
            $parCategoria->PAC_NOME = $request->nome;
            $parCategoria->save();
                        
            // Inclui os novos subcategorias
            $subcategorias = $request->subcategorias;
            foreach ($subcategorias as $subcategoria_id){ 
                $sub = ParSubcategoria::find($subcategoria_id);
                $newRelParSubcategoria = new ParSubcategoria();
                $newRelParSubcategoria->SPA_NOME = $subcategoria_id;
                $newRelParSubcategoria->save();    
            }

            return redirect()->route('admin_par_cat_list')->with('sucesso', 'Promoção alterado com sucesso');

        } else {
            //create
            $newparCategoria = new ParCategoria();
            $newparCategoria->PAC_NOME = $request->nome;
            $newparCategoria->save();

            // Inclui os novos
            $subcategorias = $request->subcategorias;
            foreach ($subcategorias as $subcategoria_id){ 
                $newParSubcategoria = new ParSubcategoria();
                $newParSubcategoria->SPA_NOME = $subcategoria_id;
                $newParSubcategoria->SCA_ID = $newparCategoria->PCA_ID;
                $newParSubcategoria->save();    
            }

            return redirect()->route('admin_par_cat_list')->with('sucesso', 'Categoria sindicato criado com sucesso');
        }
        
    }

    function parAprovarDesaprovar($id) {
        $parceiro = Parceiro::find($id);

        $txt = "";
        if($parceiro->PAR_APROVADO == 'N') {
            $parceiro->PAR_APROVADO = 'S';
            $txt = "Parceiro aprovado com sucesso";
        } else {
            $parceiro->PAR_APROVADO = 'N';
            $txt = "Parceiro desaprovado com sucesso";
        }
        $parceiro->save();

        return redirect()->route('admin_par_list')->with('sucesso', $txt);
    }

    function parActiveOrDeactive($id) {
        $parceiro = Parceiro::find($id);

        $txt = "";
        if($parceiro->PAR_ATIVADO == 'N') {
            $parceiro->PAR_ATIVADO = 'S';
            $txt = "Parceiro Ativado com sucesso";
        } else {
            $parceiro->PAR_ATIVADO = 'N';
            $txt = "Parceiro Desativado com sucesso";
        }
        $parceiro->save();

        return redirect()->route('admin_par_list')->with('sucesso', $txt);
    }

    function parCategorias() {
        $categorias = Parceiro::getCategorias();
        return view('adm.categoriasParceiro', ['categorias' => $categorias]);
    }  

    public function parCategoria($id) {
        if($id == 0) {
            // Create
            $categoria = new ParCategoria();
        } else {
            // Update
            $categoria = ParCategoria::find($id);
        }
        return view('adm.categoriaParceiro', ['categoria' => $categoria]);
    }    

    function parEstabelecimentos() {
        $estabelecimentos = Estabelecimento::whereNotNull('PAR_ID')->get();
        return view('adm.estabelecimentosParceiro', [
            'estabelecimentos' => $estabelecimentos
        ]);
    }

    function parEstabelecimento($id) {

        if($id == 0) {
            // Create
            $estabelecimento = new Estabelecimento();
        } else {
            // Update
            $estabelecimento = Estabelecimento::find($id);
        }

        $parceiros = Parceiro::all();

        return view('adm.estabelecimentoParceiro', 
            [
                'estabelecimento' => $estabelecimento,
                'parceiros' => $parceiros
            ]);
    }

    function parEstUpdateOrCreate(Request $request) 
    {
        $parceiro_id = $request->parceiro_id;

        $estabelecimento = Estabelecimento::find($request->id);

        // dd($sindicato_id);
        if($estabelecimento) {
            //update
            $estabelecimento->EST_NOME = $request->nome;
            $estabelecimento->EST_CEP = $request->cep;
            $estabelecimento->EST_UF = $request->uf;
            $estabelecimento->EST_CIDADE= $request->cidade;
            $estabelecimento->EST_BAIRRO = $request->bairro;
            $estabelecimento->EST_RUA = $request->rua;
            $estabelecimento->EST_NUMERO = $request->numero;
            $estabelecimento->EST_COMPLEMENTO = $request->complemento;
            $estabelecimento->EST_LAT = $request->latitude;
            $estabelecimento->EST_LNG = $request->logitude;
            $estabelecimento->EST_TELEFONE = $request->telefone;
            $estabelecimento->EST_TELEFONE_ALT = $request->telefone_alt;

            $estabelecimento->save();

            return redirect()->route('admin_par_est_list')->with('sucesso','Estabelecimento alterado com sucesso');
   
        } else {
            //create
            $newestabelecimento = new Estabelecimento();
            $newestabelecimento->PAR_ID = $parceiro_id;
            $newestabelecimento->EST_NOME = $request->nome;
            $newestabelecimento->EST_CEP = $request->cep;
            $newestabelecimento->EST_UF = $request->uf;
            $newestabelecimento->EST_CIDADE= $request->cidade;
            $newestabelecimento->EST_BAIRRO = $request->bairro;
            $newestabelecimento->EST_RUA = $request->rua;
            $newestabelecimento->EST_NUMERO = $request->numero;
            $newestabelecimento->EST_COMPLEMENTO = $request->complemento;
            $newestabelecimento->EST_LAT = $request->latitude;
            $newestabelecimento->EST_LNG = $request->logitude;
            $newestabelecimento->EST_TELEFONE = $request->telefone;
            $newestabelecimento->EST_TELEFONE_ALT = $request->telefone_alt;
            $newestabelecimento->save();

            return redirect()->route('admin_par_est_list')->with('sucesso', 'Estabelecimento criado com sucesso');
        }
    }

    public function parEstActiveOrDeactive(Request $request) 
    {
      $parceiroEstabelecimento = Estabelecimento::find($request->id);
      $txt = "";
      if($parceiroEstabelecimento->EST_ATIVADO == 'N') {
          $parceiroEstabelecimento->EST_ATIVADO = 'S';
          $txt = "Endereço parceiro Ativado com sucesso";
      } else {
          $parceiroEstabelecimento->EST_ATIVADO = 'N';
          $txt = "Endereço parceiro Desativado com sucesso";
      }
      $parceiroEstabelecimento->save();

      return redirect()->route('admin_par_est_list')->with('sucesso', $txt);
    }

  function promocoes() 
  {
    $promocoes = Promocao::all();
    return view('adm.promocoes', ['promocoes' => $promocoes]);
  }

  function promocao($id) 
  {
    if($id == 0) {
      // Create
      $promocao = new Promocao();
    } else {
      // Update
      $promocao = Promocao::find($id);
    }

    $parceiros = Parceiro::where('PAR_ATIVADO', 'S')->get();

    return view('adm.promocao', ['promocao' => $promocao, 'parceiros' => $parceiros]);
  }

    public function proCategorias() 
    {
      $categorias = Promocao::getCategorias();
      return view('adm.categoriasPromocao', ['categorias' => $categorias]);
    }   

    function proUpdateOrCreate(Request $request) 
    {
        // dd($request);
        $txt = "";

        $promocao = Promocao::find($request->id);
        if($promocao) {
            //update
            $promocao->PAR_ID = $request->parceiro;
            $promocao->PRO_NOME = $request->nome;
            $promocao->PRO_DESCRICAO = $request->descricao;
            $promocao->PRO_PORCENTAGEM= $request->porcentagem;
            $promocao->PRO_VALIDADE = $request->validade;

            if($request->file('foto')) {
                $promocao->PRO_FOTO = "storage".substr($request->file('foto')->store('public/promocao_foto'), 6);
            }
            $promocao->save();
            $txt = 'Promoção alterada com sucesso';
                        
            // Apaga todos os existentes
            $subcategoriaExist = RelProSubcategoria::getRelProSubcatPromocao($promocao->PRO_ID);
            foreach ($subcategoriaExist as $subExist){ 
                $subExist->delete();   
            }
            // Inclui os novos
            $subcategorias = $request->subcategorias;
            foreach ($subcategorias as $subcategoria_id){ 
                $sub = ProSubcategoria::find($subcategoria_id);
                $newRelProSubcategoria = new RelProSubcategoria();
                $newRelProSubcategoria->SPC_ID = $sub->SPC_ID;
                $newRelProSubcategoria->PCA_ID = $sub->PCA_ID;
                $newRelProSubcategoria->PAR_ID = $sub->PAR_ID;
                $newRelProSubcategoria->PRO_ID = $promocao->PRO_ID;
                $newRelProSubcategoria->save();    
            }
        } else {
            //create
            $newpromocao = new Promocao();
            $newpromocao->PAR_ID = $request->parceiro;
            $newpromocao->PRO_NOME = $request->nome;
            $newpromocao->PRO_DESCRICAO = $request->descricao;
            $newpromocao->PRO_PORCENTAGEM= $request->porcentagem;
            $newpromocao->PRO_VALIDADE = $request->validade;

            
            if($request->file('foto')) {
                $newpromocao->PRO_FOTO = "storage".substr($request->file('foto')->store('public/promocao_foto'), 6);
            }

            $newpromocao->PRO_ATIVADO = 'S';
            $newpromocao->save();
            $txt = 'Promoção criada com sucesso';

            // Inclui os novos
            if ($request->subcategorias) {
                $subcategorias = $request->subcategorias;
                foreach ($subcategorias as $subcategoria_id){ 
                    $sub = ProSubcategoria::find($subcategoria_id);
                    $newRelProSubcategoria = new RelProSubcategoria();
                    $newRelProSubcategoria->SPC_ID = $sub->SPC_ID;
                    $newRelProSubcategoria->PCA_ID = $sub->PCA_ID;
                    $newRelProSubcategoria->PAR_ID = $sub->PAR_ID;
                    $newRelProSubcategoria->PRO_ID = $promocao->PRO_ID;
                    $newRelProSubcategoria->save();    
                }
            }
        }
        return redirect()->route('admin_pro_list')->with('sucesso', $txt);

    }

    function proCatUpdateOrCreate(Request $request) 
    {
        // dd($request);
        $proCategoria = ProCategoria::find($request->id);
        $proCategoria_id = 0;
        if($proCategoria) {
            //update
            $proCategoria->PCA_NOME = $request->nome;
            $proCategoria->save();
                        
            // Inclui os novos subcategorias
            $subcategorias = $request->subcategorias;
            foreach ($subcategorias as $subcategoria_id){ 
                $sub = ProSubcategoria::find($subcategoria_id);
                $newRelProSubcategoria = new ProSubcategoria();
                $newRelProSubcategoria->SPC_NOME = $subcategoria_id;
                $newRelProSubcategoria->save();    
            }

            return redirect()->route('admin_pro_cat_list')->with('sucesso', 'Promoção alterado com sucesso');

        } else {
            //create
            $newproCategoria = new ProCategoria();
            $newproCategoria->PCA_NOME = $request->nome;
            $newproCategoria->save();

            // Inclui os novos
            $subcategorias = $request->subcategorias;
            foreach ($subcategorias as $subcategoria_id){ 
                $newProSubcategoria = new ProSubcategoria();
                $newProSubcategoria->SPC_NOME = $subcategoria_id;
                $newProSubcategoria->PCA_ID = $newproCategoria->PCA_ID;
                $newProSubcategoria->save();    
            }

            return redirect()->route('admin_pro_cat_list')->with('sucesso', 'Categoria sindicato criado com sucesso');
        }
        
    }

    function proActiveOrDeactive($id) {
        $promocao = Promocao::find($id);

        $txt = "";
        if($promocao->PRO_ATIVADO == 'N') {
            $promocao->PRO_ATIVADO = 'S';
            $txt = "Promoção Ativado com sucesso";
        } else {
            $promocao->PRO_ATIVADO = 'N';
            $txt = "Promoção Desativado com sucesso";
        }
        $promocao->save();

        return redirect()->route('admin_pro_list')->with('sucesso', $txt);
    }


    function cupons() {
        $cupons = Cupom::all();

        return view('adm.cupons', ['cupons' => $cupons]);
    }

    function cupActiveOrDeactive($id) {
        $cupom = Cupom::find($id);

        $txt = "";
        if($cupom->CUP_ATIVADO == 'N') {
            $cupom->CUP_ATIVADO = 'S';
            $txt = "Cupom Ativado com sucesso";
        } else {
            $cupom->CUP_ATIVADO = 'N';
            $txt = "Cupom Desativado com sucesso";
        }
        $cupom->save();

        return redirect()->route('admin_cup_list')->with('sucesso', $txt);
    }

    function cupUsar($id) {
        $cupom = Cupom::find($id);
        $txt = "";
        if($cupom->CUP_USADO === null) {
            $cupom->CUP_USADO = date('Y-m-d H:i:s');
            $txt = "Cupom setado como USADO com sucesso";
        } else {
            $cupom->CUP_USADO = null;
            $txt = "Cupom setado como NÃO USADO com sucesso";
        }
        $cupom->save();

        return redirect()->route('admin_cup_list')->with('sucesso', $txt);
    }


    // public function login()
	// {
	// 	return view('login');
	// }

    // public function logar(Request $request)
    // {
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         return view('A_VIEW_DO_USUARIO_LOGADO');
    //     }else{
    //     return redirect()->back()->with('falha','Usuário ou senha inválido!');
    //     }
    // }

    // public function cadastrar()
    // {
    //     return view('cadastrar');
    // }

    // public function register(Request $request)
    // {
    //     $this->validate($request,[
    //     'name' => 'required',
    //     'email' => 'required',
    //     'password' => 'required|min:6',
    //     'conf_password' => 'required'
    //     ]);

    //     if($request->password != $request->conf_password) {
    //         return redirect()->back()->with('falha','Senhas não conferem!');
    //     }

    //     $usuarioExiste = User::where('email',$request->email)->first();

    //     if($usuarioExiste){
    //     return redirect()->back()->with('fail','Email existente!');
    //     }

    //     $user = new User;
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->type = 'ADMIN';
    //     $user->status = 1;
    //     $user->password = bcrypt($request->password);
    //     $user->save();
    //     Auth::attempt(['email' => $request->email, 'password' => $request->password]);

    //     return view('A_VIEW_DO_USUARIO_LOGADO');
    // }
  
    
}
