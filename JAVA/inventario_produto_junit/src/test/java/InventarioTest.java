import org.junit.Before;
import org.junit.Test;

import com.example.Inventario;
import com.example.Produto;

import static org.junit.Assert.assertEquals;

import java.util.List;

public class InventarioTest {
    private Inventario inventario;

    @Before
    public void setup(){
        inventario = new Inventario();
    }

    @Test
    public void testeAdicionar(){
        Produto produto = new Produto(1,"teste",10,"teste",99.99);
        inventario.adicionar(produto);
        List<Produto> lista = inventario.listar();
        assertEquals(1, lista.size());
    }

    @Test
    public void testeRemover(){
        testeAdicionar();
        inventario.remover(1);
        List<Produto> lista = inventario.listar();
        assertEquals(0, lista.size());
    }

    @Test
    public void testeAtualizar(){
        testeAdicionar();
        inventario.atualizar(1, 20, 200);
        List<Produto> lista = inventario.listar();
        Produto produtoAtualizado = lista.get(0);
        assertEquals(20, produtoAtualizado.getQuantidade());
        assertEquals(200, produtoAtualizado.getPreco(),0);

    }
    
}
