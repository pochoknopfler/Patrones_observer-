
package org.magmax.patterns.observer;

import java.util.Observable;

public class MyObservable extends Observable implements Runnable {

    public void fire_event() {
        this.notifyObservers("Ey! What's up?");
        this.setChanged();
    }

    @Override
    public void run() {
        while (true) {
            fire_event();
            sleep();
        }
    }

    private void sleep() {
        try {
            Thread.sleep(100);
        } catch (InterruptedException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
    }
}