package com.example;

public class Calculadora {
    //soma
    public int soma(int a, int b) {
        return a + b;
    }
    //subtração
    public int subtracao(int a, int b) {
        return a - b;
    }
    //multiplicação
    public int multiplicacao(int a, int b) {
        return a * b;
    }
    //divisão
    public double divisao(double a, double b) {
        if (b == 0) {
            throw new IllegalArgumentException("Divisão por zero não é permitida");
        }
        return a / b;
    }
    //potência
    public double potencia(double a, double b){
        return Math.pow(a,b);
    }
    //raiz
    public double raiz(double a,double b){
        if(b<=0){
            throw new IllegalArgumentException("A Raiz deve ser maior que Zero");
        }
        double raiz = 1/b;
        if(a<0 && b%2==0){
            throw new ArithmeticException();
        }
        double resultado = Math.pow(a,raiz);
        return resultado;
    }
}
