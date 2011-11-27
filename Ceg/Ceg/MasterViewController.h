//
//  MasterViewController.h
//  Ceg
//
//  Created by Christian Rönningen on 2011-11-23.
//  Copyright (c) 2011 Paperton. All rights reserved.
//

#import <UIKit/UIKit.h>

@class DetailViewController;

#import <CoreData/CoreData.h>

@interface MasterViewController : UITableViewController <NSFetchedResultsControllerDelegate,UITableViewDataSource,UITableViewDelegate>
{
    
}

@property (retain, nonatomic) DetailViewController *detailViewController;
@property (nonatomic,retain) NSFetchedResultsController* apprenticeFetchedResultsController;


@end
