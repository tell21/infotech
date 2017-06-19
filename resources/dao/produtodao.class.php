<?php
include_once'factory/fabrica.class.php';
include_once'cadastrodao.class.php';
include_once'categoriadao.class.php';
include_once'imagemdao.class.php';
class ProdutoDAO {

    private $lastId;

    public function inserirProduto($produto, $idAdministrador){

        $cadastroDao = new CadastroDAO();
        $cadastroDao->inserirCadastro($produto->getCadastro(), $idAdministrador);
        $idCadastro = $cadastroDao->getLastId();
        $produto->getCadastro()->setId($idCadastro);

        if($produto->getCategoria()->getId() == null){
            $categoriaDao = new CategoriaDAO();
            $categoriaDao->inserirCategoria($produto->getCategoria(), $idCadastro);
            $produto->getCategoria()->setId($categoriaDao->getLastId());
        }

        $sql =
        "INSERT INTO produto (nome, descricao, estoque_quantidade, preco, produto_cadastro_id, produto_categoria_id)
        VALUES ('".$produto->getNome()."','".$produto->getDescricao()."',".$produto->getEstoque()->getQuantidade().","
        .$produto->getPreco().",".$produto->getCadastro()->getId().",".$produto->getCategoria()->getId().
        ")";


        $con = (new Fabrica())->abrirConexao();

        $con->query($sql);

        $this->lastId = $con->lastInsertId();

        $con = null;


        $it = new ArrayIterator($produto->getImagens());
        $dao = new ImagemDAO();
        while ($it->valid()) {
            $dao->inserirImagem($it->current(),$this->lastId);
            $it->next();
        }
    }

    public function getLastId(){
        return $this->lastId;
    }

    public function existeProduto($nome){
        $con = (new Fabrica())->abrirConexao();
        $sql = "SELECT nome FROM produto WHERE nome=:nome";
        $stm = $con->prepare($sql);
        $stm->bindParam(":nome", $nome);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        $con = null;

        return $result;
    }

    public function getUltimosProdutos(){
        $con = (new Fabrica())->abrirConexao();
        $sql = "SELECT produto.id,produto.nome,produto.descricao,produto.preco,produto.estoque_quantidade,categoria.nome as 'categoria_nome' FROM produto JOIN categoria ON produto.produto_categoria_id=categoria.id ORDER BY produto.id DESC LIMIT 12";
        $stm = $con->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        $con = null;

        if($result === false){
            return null;
        }

        $imagens = array();
        foreach ($result as $key => $value){
          $imagens["".$value['id'].""] = (new ImagemDAO())->getImagensPorProduto($value['id']);
        }

        $result['imagens'] = $imagens;

        return $result;
    }

    public function getProdutos(){
        $con = (new Fabrica())->abrirConexao();
        $sql = "SELECT produto.id,produto.nome,produto.descricao,produto.preco,produto.estoque_quantidade,categoria.nome as 'categoria_nome' FROM produto JOIN categoria ON produto.produto_categoria_id=categoria.id ORDER BY produto.id;";
        $stm = $con->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        $con = null;

        if($result === false){
            return null;
        }

        $imagens = array();
        foreach ($result as $key => $value){
          $imagens["".$value['id'].""] = (new ImagemDAO())->getImagensPorProduto($value['id']);
        }

        $result['imagens'] = $imagens;

        return $result;
    }

    public function getProdutoPorId($id){
        $con = (new Fabrica())->abrirConexao();
        $sql = "SELECT produto.id,produto.nome,produto.descricao,
        produto.preco,produto.estoque_quantidade,categoria.nome as 'categoria_nome'
        FROM produto JOIN categoria ON produto.produto_categoria_id=categoria.id
        WHERE produto.id=:id";
        $stm = $con->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        $con = null;

        if($result === false){
            return null;
        }

        $result['imagens'] = (new ImagemDAO())->getImagensPorProduto($id);


        return $result;
    }

    public function atualizar($produto){
        $sql =
        "UPDATE produto SET nome='".$produto->getNome()."', descricao='".$produto->getDescricao()."',
        estoque_quantidade=".$produto->getEstoque()->getQuantidade().",
        preco=".$produto->getPreco().", produto_categoria_id=".$produto->getCategoria()->getId().
        " WHERE id=".$produto->getId();

        $con = (new Fabrica())->abrirConexao();

        $con->query($sql);

        $con = null;


        if($produto->getImagens() !== null){
            $it = new ArrayIterator($produto->getImagens());
            $dao = new ImagemDAO();
            while ($it->valid()) {
                $dao->inserirImagem($it->current(),$produto->getId());
                $it->next();
            }
        }
    }

    public function remover($id){
        $con = (new Fabrica())->abrirConexao();
        $sql = "DELETE FROM produto WHERE id=:id";
        $stm = $con->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
        $con = null;

    }

    public function getProdutosPorCategoria($id){
        $con = (new Fabrica())->abrirConexao();
        $sql = "SELECT produto.id,produto.nome,produto.descricao,
        produto.preco,produto.estoque_quantidade,categoria.nome as 'categoria_nome'
        FROM produto JOIN categoria ON produto.produto_categoria_id=categoria.id
        WHERE produto.produto_categoria_id=:id";
        $stm = $con->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
        $result = $stm->fetchAll();
        $con = null;

        if($result === false){
            return null;
        }

        $imagens = array();
        foreach ($result as $key => $value){
          $imagens["".$value['id'].""] = (new ImagemDAO())->getImagensPorProduto($value['id']);
        }

        $result['imagens'] = $imagens;

        return $result;
    }



}
?>
