package com.example;

import org.junit.Before;
import org.junit.Test;
import static org.junit.Assert.assertEquals;

public class CalculadoraTeste {

    private Calculadora calc;
    
    @Before
    public void setup() {
        calc = new Calculadora();
    }
    
    @Test
    public void testeSoma() {
        int resultado = calc.soma(2, 3);
        assertEquals(5, resultado);
    }

    @Test
    public void testeSubtracao(){
        int resultado = calc.subtracao(9, 5);
        assertEquals(4, resultado);
    }

    @Test
    public void testeMultiplicacao(){
        int resultado = calc.multiplicacao(2, 3);
        assertEquals(6, resultado);
    }

    @Test
    public void testeDivisao(){
        double resultado = calc.divisao(10, 3);
        assertEquals(3.3,resultado,0.1);
    }

    @Test(expected = IllegalArgumentException.class)
    public void testeDivisaoZero(){
        double resultado = calc.divisao(5, 0);
    }

    @Test
    public void testepotencia(){
        double resultado = calc.potencia(2, 3);
        assertEquals(8, resultado,0);
    }
    
    @Test
    public void testeRaiz(){
        double resultado = calc.raiz(125,3);
        assertEquals(5, resultado, 0.1);
    }

    @Test(expected = IllegalArgumentException.class)
    public void testeRaizNegativa(){
        double resultado = calc.raiz(5, 0);
    }

    @Test(expected = ArithmeticException.class)
    public void testeRaizParNegativa(){
        double resultado = calc.raiz(-4, 2);
    }




}
