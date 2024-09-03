package com.example;

import java.util.ArrayList;
import java.util.List;

public class Inventario {
    //atributo
    private List<Produto> list;
    //construtor
    public Inventario() {
        list = new ArrayList<>();
    }
    //métodos
    //adicionar
    public void adicionar(Produto produto){
        list.add(produto);
    }
    //deletar ou remover
    public void remover(int id){
        list.removeIf(produto -> produto.getId()==id);
    }
    //atualizar
    public void atualizar(int id, int quantidade, double preco){
        for (Produto produto : list) {
            if(produto.getId()==id){
                produto.setQuantidade(quantidade);
                produto.setPreco(preco);
                break;
            }
        }
    }
    //listar
    public List<Produto> listar(){
        return new ArrayList<>(list);
    }

}
