
package org.magmax.patterns.observer;

import java.util.Observable;
import java.util.Observer;

public class MyObserver implements Observer {

    @Override
    public void update(Observable observable, Object event) {
        System.out.println("Something happened!");
    }   
}